<?php

namespace HW52\Controllers;

use \HW52\Core\Controller;
use \HW52\Models\ModelUsers;

class ControllerMain extends Controller
{

    public function actionIndex()
    {
        if (empty($_POST)) {
            $formData = [
                'attributes' => [
                    'name' => 'Login',
                    'method' => 'Post',
                ],
                'items'  =>  [
                    ['type' =>'text', 'name' => 'login', 'label' =>'Логин', 'placeholder' => 'Логин',],
                    ['type' =>'password', 'name' => 'password', 'label' =>'Пароль', 'placeholder' => 'Пароль',],
                ],
                'button' => [
                    'text'              =>  'Войти',
                    'question'          =>  'Нет аккаунта?',
                    'questionLink'      =>  'registration',
                    'questionLinkText'  =>  'Зарегистрируйтесь',
                ]
            ];

            $this->view->generate('base_view.twig',
                array(
                    'title' => 'Авторизация',
                    'content' => $this->view->viewForm($formData),
                )
            );
        } else {
            $user = ModelUsers::loginCheck();
            if ($user) {
                $_SESSION['user'] = $user['login'];
                $_SESSION['idUser'] = $user['id'];
                header('Location: profile');
            } else {
                $_SESSION['message'] = 'Пользователь не найден.';
                header('Location: /');
            }
        }
    }

}