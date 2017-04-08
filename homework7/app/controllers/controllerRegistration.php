<?php

namespace MyApp\Controllers;

use MyApp\Core\Controller;
use MyApp\Models\User;
use MyApp\Config;
use \ReCaptcha\ReCaptcha;
use \GUMP;

class ControllerRegistration extends Controller
{


    public function actionIndex()
    {
        if (!empty($_POST)) {
            $checkForm = GUMP::is_valid(
                $_POST,
                [
                    'login' => 'required|alpha_numeric|max_len,25|min_len,6',
                    'password' => 'required|max_len,100|min_len,3',
                ]
            );


//                $reCaptcha = new ReCaptcha(Config::$reCaptcha['secretKey']);
//                $resp = $reCaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
                $resp = true;
            if ($resp) {
                //if ($resp->isSuccess()) {
                if ($_POST['password'] != $_POST['password1']) {
                    self::message("Пароли не совпадают!");
                } elseif ($checkForm !== true) {
                    $message = '';
                    foreach ($checkForm as $value) {
                        $message .= "$value<br>";
                    }
                    $this->message($message);
                } else {
                    $result = User::addUser([
                        'login' => $_POST['login'],
                        'password' => $_POST['password'],
                        'ip' => $_SERVER['REMOTE_ADDR'],
                    ]);
                    if ($result) {
                        self::message("Пользователь успешно {$result['login']} добавлен");
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

        $this->view->generate(
            'base_view.twig',
            array(
                'title' => 'Регистрация',
                'content' => $this->view->viewForm($formData),
            )
        );
    }

    public function actionChangePassword($id)
    {
        $login = User::getUserById($id)['login'];

        if (!empty($_POST)) {
            $checkForm = GUMP::is_valid(
                $_POST,
                [
                    'password' => 'required|max_len,100|min_len,3',
                ]
            );

            if ($_POST['password'] != $_POST['password1']) {
                self::message("Пароли не совпадают!");
            } elseif ($checkForm !== true) {
                $message = '';
                foreach ($checkForm as $value) {
                    $message .= "$value<br>";
                }
                $this->message($message);
            } else {
                $result = User::updateUser([
                    'id'         => $id,
                    'password'  => $_POST['password'],
                ]);
                if ($result) {
                    self::message("Пароль изменен!");
                } else {
                    $_SESSION['message'] = "Произошла ошибка при обновление!";
                }
            }
        }

        $formData = [
            'attributes' => [
                'name' => 'Registration',
                'method' => 'Post',
            ],
            'items'  =>  [
                ['type' =>'label', 'name' => 'login', 'label' =>'Логин', 'placeholder' => 'Логин', 'value' => $login],
                ['type' =>'password', 'name' => 'password', 'label' =>'Пароль', 'placeholder' => 'Пароль',],
                ['type' =>'password', 'name' => 'password1', 'label' =>'Пароль (повтор)', 'placeholder' => 'Пароль',],
            ],
            'button' => ['text' => 'Сохранить',  ]
        ];

        $this->view->generate(
            'base_view.twig',
            array(
                'title' => "Изменение паролья для $login",
                'content' => $this->view->viewForm($formData),
            )
        );
    }

    public function actionAdd()
    {
        if (!empty($_POST)) {
            $checkForm = GUMP::is_valid(
                $_POST,
                [
                    'login' => 'required|alpha_numeric|max_len,25|min_len,6',
                    'password' => 'required|max_len,100|min_len,3',
                ]
            );

            $resp = true;
            if ($_POST['password'] != $_POST['password1']) {
                self::message("Пароли не совпадают!");
            } elseif ($checkForm !== true) {
                $message = '';
                foreach ($checkForm as $value) {
                    $message .= "$value<br>";
                }
                $this->message($message);
            } else {
                $result = User::addUser([
                    'login' => $_POST['login'],
                    'password' => $_POST['password'],
                    'ip' => $_SERVER['REMOTE_ADDR'],
                ]);
                if ($result) {
                    header("Location: /profile/user/{$result['id']}");
                } elseif ($result['error']) {
                    $_SESSION['message'] = $result['error'];
                } else {
                    $_SESSION['message'] = "Пользователь {$_POST['login']} существует!";
                }
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
            ],
            'button' => ['text' => "Сохранить"]
        ];

        $this->view->generate(
            'base_view.twig',
            array(
                'title' => 'Добавление нового пользователя',
                'content' => $this->view->viewForm($formData),
            )
        );
    }




}