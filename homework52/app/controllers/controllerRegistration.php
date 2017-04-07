<?php

namespace HW52\Controllers;

use \HW52\Core\Controller;
use \HW52\Models\ModelUsers;
use \HW52\Config;
use \ReCaptcha\ReCaptcha;

class ControllerRegistration extends Controller
{

    public function actionIndex()
    {
        if (!empty($_POST)) {
            $recaptcha = new ReCaptcha(Config::$reCaptcha['secretKey']);
            $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
            if ($resp->isSuccess()) {
                if ($_POST['password'] != $_POST['password1']) {
                    $_SESSION['message'] = "Пароли не совпадают!";
                } elseif ((strlen($_POST['login'])<3) || (strlen($_POST['password'])<3)) {
                    $this->message('Логин и пароль должны быть больше 2 символов');
                } else {
                    $result = ModelUsers::addUser();
                    if ($result == '1') {
                        $_SESSION['message'] = "Пользователь успешно {$_POST['login']} добавлен";
                    } elseif ($result['error']) {
                        $_SESSION['message'] = $result['error'];
                    } else {
                        $_SESSION['message'] = "Пользователь {$_POST['login']} существует!";
                    }
                }
            } else {
                $this->message('Пройдите проверку "reCaptcha"!');
            }
        }

        $formData = [
            'attributes' => [
                'name' => 'Registration',
                'method' => 'Post',
            ],
            'items'  =>  [
                ['type' =>'text', 'name' => 'login', 'label' =>'Логин', 'placeholder' => 'Логин', 'value' => $_POST['login']],
                ['type' =>'password', 'name' => 'password', 'label' =>'Пароль', 'placeholder' => 'Пароль',],
                ['type' =>'password', 'name' => 'password1', 'label' =>'Пароль (повтор)', 'placeholder' => 'Пароль',],
                ['type' => 'reCaptcha', "siteKey"   => Config::$reCaptcha['siteKey'],
                    "lang" => Config::$reCaptcha['lang'],]
            ],
            'button' => [
                'text'              =>  'Зарегистрироваться',
                'question'          =>  'Зарегистрированы?',
                'questionLink'      =>  '/',
                'questionLinkText'  =>  'Авторизируйтесь',
            ]
        ];

        $this->view->generate('base_view.twig',
            array(
                'title' => 'Регистрация',
                'content' => $this->view->viewForm($formData),
            )
        );
    }

}