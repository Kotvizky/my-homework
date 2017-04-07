<?php

namespace HW52\Controllers;

use \HW52\Core\Controller;
use \HW52\Models\ModelUsers;
use \HW52\Config;
use \DateTime;

class ControllerUsers extends Controller
{
    public function actionIndex()
    {
        $users = ModelUsers::getUsers('login, name, age, description, photo, id ', '1 = 1', 'age');

        $dateNow = new DateTime("now");
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

            echo $users[$i]['age'];
            if ($users[$i]['age'] != "0000-00-00") {
                $intervat = $dateNow->diff(new DateTime($users[$i]['age']));
                if (($intervat->y) < 18) {
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
        $result = false;
        $logoff = false;
        if ($id) {
            $user = ModelUsers::getUsers('id,login', "id = $id");
            if ($user && (count($user) == 1)) {
                $user = $user[0];
                $result = ModelUsers::deleteUsers($user['id']);
            }
            $logoff = $user['login'] == $_SESSION['user'];
        }
        switch (1) {
            case (($result == 1) && $logoff):
                unset($_SESSION['user']);
                unset($_SESSION['id']);
                $_SESSION['message'] = "Пользователь {$user['login']} успешно удален!";
                header('Location: /');
                break;
            case (($result == 1) && !$logoff):
                $_SESSION['message'] = "Пользователь {$user['login']} успешно удален!";
                header('Location: /users');
                break;
            default:
                $_SESSION['message'] = "Произошла ошибка при удалении!";
                header('Location: /users');
                return true;
        }

        return true;
    }
}