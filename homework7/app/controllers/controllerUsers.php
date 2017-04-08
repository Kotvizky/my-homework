<?php

namespace MyApp\Controllers;

use MyApp\Core\Controller;
use MyApp\Models\User;
use MyApp\Config;
use \DateTime;

class ControllerUsers extends Controller
{
    public function actionIndex()
    {
        $users = User::getUsers(['login', 'name','age', 'description','photo','id']);
        for ($i = 0; $i < count($users); $i++) {
            if ($users[$i]['photo']) {
                $users[$i]['photo'] = [ 'img' => Config::homeDir(). Config::$photoDir . $users[$i]['photo'] ];
            } else {
                $users[$i]['photo'] = '';
            }
            $users[$i]['link'] = [
                'link' => [
                    ['link' =>"/users/delete/{$users[$i]['id']}",    'comment'   =>  'Удалить пользователя?',],
                    ['link' =>"/profile/user/{$users[$i]['id']}",   'comment'   =>  'Редаткировать?',],
                    ['link' =>"/registration/changePassword/{$users[$i]['id']}",   'comment'   =>  'Сменить пароль?',],
                    ]
            ];
            unset($users[$i]['id']);

            if ($users[$i]['age'] != 0) {
                if ($users[$i]['age']  < 18) {
                    $users[$i]['age'] = 'Несовершеннолетний';
                } else {
                    $users[$i]['age'] = 'Совершеннолетний';
                }
            } else {
                $users[$i]['age'] = 'Неизвестно';
            }
        }

        $TableData = [
            'head' => [
                'Пользователь (логин)',
                'Имя',
                'Возраст',
                'Описание',
                'Фотография',
                'Действия',
            ],
        ];

        $TableData['rows'] = $users;

        $this->view->generate(
            'base_view.twig',
            array(
                'title' => 'Список пользователей',
                'content' => $this->view->viewTable($TableData),
            )
        );
    }

    public function actionDelete($id)
    {
        $id = (int)($id);
        $result = false;
        $logoff = false;
        if ($id) {
            $user = User::getUserById($id);
            if ($user && (count($user) == 1)) {
                $result = User::deleteUsers($user->id);
            }
            $logoff = $user['id'] == self::user('id');
        }
        switch (1) {
            case (($result == null) && $logoff):
                unset($_SESSION['user']);
                unset($_SESSION['id']);
                self::message("Пользователь {$user['login']} успешно удален!");
                header('Location: /');
                break;
            case (($result == null) && !$logoff):
                self::message("Пользователь {$user['login']} успешно удален!");
                header('Location: /users');
                break;
            default:
                self::message("Произошла ошибка при удалении!");
                header('Location: /users');
                return true;
        }

        return true;
    }
}