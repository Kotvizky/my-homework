<?php

namespace HW52\Controllers;

use \HW52\Core\Controller;
use \HW52\Models\ModelUsers;

class ControllerRegistration extends Controller
{

    public function actionIndex()
    {
        if (!empty($_POST)) {
            if ($_POST['password'] != $_POST['password1']) {
                $_SESSION['message'] = "Пароли не совпадают!";
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