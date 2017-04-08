<?php
/**
 * Created by PhpStorm.
 * User: Johnny
 * Date: 06.04.2017
 * Time: 18:12
 */

namespace MyApp\Controllers;

use MyApp\Core\Controller;
use MyApp\Config;
use \PHPMailer;
use MyApp\Models\User;

class ControllerEmail extends Controller
{

    protected $mail;


    protected function initMail()
    {
        new PHPMailer;
        $this->mail = new PHPMailer;

//$mail->SMTPDebug = 3;                                       // Enable verbose debug output

        $this->mail->isSMTP();                                             // Set mailer to use SMTP
        $this->mail->CharSet  = 'UTF-8';

        $this->mail->Host       = 'smtp.gmail.com';   // Specify main and backup SMTP servers
        $this->mail->SMTPAuth   = true;                                    // Enable SMTP authentication
        $this->mail->Username   = 'lstest2017@gmail.com';                      // SMTP username
        $this->mail->Password   = '2017LsTest';                                // SMTP password
        $this->mail->SMTPSecure = 'ssl';                                   // Enable TLS encryption, `ssl` also accepted
        $this->mail->Port       = 465;                                     // TCP port to connect to
        $this->mail->setLanguage('ru');
    }


    public function actionIndex()
    {
        //$this->mail = new PHPMailer;



        $data = $_POST;
        $data['emailFrom'] = Config::$emailFrom;

        if (!empty($_POST)) {
            $data = $_POST;

            $email = filter_var(
                filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
                FILTER_VALIDATE_EMAIL
            );

            if ($email && ($_POST['subject'] != '')) {
                $this->initMail();
                $this->mail->setFrom($data['emailFrom'], self::user['name']);
                $this->mail->addAddress($_POST['email'], 'App Homework52');     // Add a recipient
                $this->mail->Subject = $_POST['subject'];
                $this->mail->Body    = $_POST['body'];
                $this->mail->AltBody = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_STRING);
                if (!$this->mail->send()) {
                    $this->message('Message could not be sent.' . "Mailer Error: ' $this->mail->ErrorInfo");
                } else {
                    $this->message('Message has been sent');
                }
            } else {
                $message = '';
                if (!$email) {
                    $$message .= 'Введите корректный email!';
                }
                if ($_POST['subject'] = '') {
                    $message .=' Тема не должна быть пустой!';
                }
                $this->message($message);
            }
        }

        $formData = [
            'attributes' => [
                'name' => 'Login',
                'method' => 'Post',
            ],
            'items'  =>  [
                ['type' =>'label', 'label' => 'От','value' => "{$data['emailFrom']}, ". self::user('name')],
                ['type' =>'text', 'name' => 'email', 'label' =>'Кому',
                    'placeholder' => 'Имя', 'value' => $data['email']],
                ['type' =>'text', 'name' => 'subject', 'label' =>'Тема',
                    'placeholder' => 'Имя', 'value' => $data['subject']],
                ['type' =>'textarea', 'name' => 'body', 'label' =>'Текст', 'placeholder' => 'Напишите что нибуль',
                    'value' =>$data['body']],
            ],
            'button' => ['text' => 'Отправить',]
        ];

        $this->view->generate(
            'base_view.twig',
            array(
                'title' => 'Электронная почта',
                'content' => $this->view->viewForm($formData),
            )
        );
    }

}