<?php

namespace HW52\Controllers;

use \HW52\Core\Controller;
use \HW52\Models\ModelUsers;
use \HW52\Config;

class ControllerUsers extends Controller
{
    public function actionIndex()
    {
        $users = ModelUsers::getUsers('login, name, age, description, photo, id ');

        for ($i = 0; $i < count($users); $i++) {
            if ($users[$i]['photo']) {
                $users[$i]['photo'] = [ 'img' => Config::homeDir(). Config::$photoDir . $users[$i]['photo'] ];
            } else {
                $users[$i]['photo'] = '';
            }
            $users[$i]['link'] = [
                'link' =>   "users/delete/{$users[$i]['id']}",
                'comment'   =>  'Удалить пользователя?',
            ];
            unset($users[$i]['id']);
        }

        $TableData = [
            'head' => [
                'Пользователь(логин)',
                'Имя',
                'Возраст',
                'Описание',
                'Фотография',
                'Действия',
            ],
        ];

        $TableData['rows'] = $users;

        $this->view->generate('base_view.twig',
            array(
                'title' => 'Список пользователей',
                'content' => $this->view->viewTable($TableData),
            )
        );
    }

    public function actionDelete($id)
    {
        $id = (int)($id);
        if ($id) {
            $user = ModelUsers::getUsers('id,login', "id = $id");
            if ($user && (count($user) == 1)) {
                $user = $user[0];
                $result = ModelUsers::deleteUsers($user['id']);
                if ($result == 1) {
                    if ($user['login'] == $_SESSION['user']) {
                        session_destroy();
                        session_start();
                        $_SESSION['message'] = "Пользователь {$user['login']} успешно удален!";
                        header('Location: /');
                        return true;
                    } else {
                        $_SESSION['message'] = "Пользователь {$user['login']} успешно удален!";
                        header('Location: /users');
                        return true;
                    }
                }
            }
        }
        $_SESSION['message'] = "При удалении пользователя произошла ошибка!";
        header('Location: /users');
    }
}