<?php

namespace HW52\Controllers;

use \HW52\Core\Controller;
use \HW52\Models\ModelUsers;
use \HW52\Config;

class ControllerProfile extends Controller
{
    public function actionIndex()
    {
        if (!empty($_POST)) {
            ModelUsers::updateUserByPost();
        }
        $user = ModelUsers::getUserByLogin();
        $photoLink = '';
        if ($user['photo']) {
            $photoLink = Config::homeDir() . Config::$photoDir . $user['photo'];
        }
        $formData = [
            'attributes' => [
                'name' => 'Profile',
                'method' => 'Post',
                'enctype' => 'multipart/form-data',
            ],
            'imageLink' =>  $photoLink,
            'items'  =>  [
                ['type' =>'text', 'name' => 'name', 'label' =>'Имя', 'placeholder' => 'Имя', 'value' => $user['name']],
                ['type' =>'date', 'name' => 'age', 'label' =>'Дата рождения',
                    'placeholder' => 'Дата рождения', 'value' => $user['age']],
                ['type' =>'textarea', 'name' => 'description', 'label' =>'Описание', 'placeholder' => 'Описание',
                    'value' =>$user['description']],
                ['type' =>'file'],
            ],
            'button' => [
                'text'              =>  'Записать',
            ]
        ];

        $this->view->generate('base_view.twig',
            array(
                'title' => $_SESSION['user'],
                'content' => $this->view->viewForm($formData),
            )
        );


    }
}