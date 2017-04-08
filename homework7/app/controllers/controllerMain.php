<?php

namespace MyApp\Controllers;

use MyApp\Config;
use MyApp\Core\Controller;
use MyApp\Models\User;
use \ReCaptcha\ReCaptcha;

class ControllerMain extends Controller
{

    public function actionIndex()
    {
        if (!empty($_POST)) {
            $reCaptcha = new ReCaptcha(Config::$reCaptcha['secretKey']);
            $resp = $reCaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
//            if ($resp->isSuccess()) {
            if (true) {
                $user = User::loginCheck();
                //print_r($user); die();
                if ($user) {
                    $cookie = User::getCookie($user);
                    if ($cookie) {
                        $expires = time()+3600 * 24 *14;
                        setcookie("hash", $cookie, $expires);
                        setcookie("id", $user['id'], $expires);
                    }
                    $_SESSION['user'] = $user;
                    header('Location: /profile');
                } else {
                    $_SESSION['message'] = 'Пользователь не найден.';
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

        $this->view->generate(
            'base_view.twig',
            array(
                'title' => 'Авторизация',
                'content' => $this->view->viewForm($formData),
            )
        );
    }

}