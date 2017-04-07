<?php

namespace HW52\Controllers;

use HW52\Config;
use \HW52\Core\Controller;
use \HW52\Models\ModelUsers;
use \ReCaptcha\ReCaptcha;

class ControllerMain extends Controller
{

    public function actionIndex()
    {
        if (!empty($_POST)) {
            $recaptcha = new ReCaptcha(Config::$reCaptcha['secretKey']);
            $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
            if ($resp->isSuccess()) {
                $user = ModelUsers::loginCheck();

                if ($user) {
                    $login = $user['login'];
                    $expires = time()+3600 * 24 *14;
                    $cookie = ModelUsers::getCookie($login);

                    setcookie("hash", $cookie, $expires);
                    setcookie("login", $login, $expires);

                    $_SESSION['user'] = $user['login'];
                    $_SESSION['idUser'] = $user['id'];
                    header('Location: profile');
                } else {
                    $_SESSION['message'] = 'Пользователь не найден.';
                    header('Location: /');
                }
            } else {
                $this->message('Пройдите проверку "reCaptcha"!');
            }
        }

        $formData = [
            'attributes' => [
                'name' => 'Login',
                'method' => 'Post',
            ],
            'items'  =>  [
                ['type' =>'text', 'name' => 'login', 'label' =>'Логин', 'placeholder' => 'Логин',
                    'value' => "{$_POST['login']}"],
                ['type' =>'password', 'name' => 'password', 'label' =>'Пароль', 'placeholder' => 'Пароль',
                    'value' => "{$_POST['password']}"],
                ['type' => 'reCaptcha', "siteKey"   => Config::$reCaptcha['siteKey'],
                    "lang" => Config::$reCaptcha['lang'],]
            ],
            'button' => [
                'text'              =>  'Войти',
                'question'          =>  'Нет аккаунта?',
                'questionLink'      =>  'registration',
                'questionLinkText'  =>  'Зарегистрируйтесь',
            ],
        ];

        $this->view->generate('base_view.twig',
            array(
                'title' => 'Авторизация',
                'content' => $this->view->viewForm($formData),
            )
        );
    }

}