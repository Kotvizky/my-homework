<?php

namespace MyApp\Controllers;

use MyApp\Core\Controller;
use MyApp\Models\User;
use MyApp\Config;
use GUMP;

class ControllerProfile extends Controller
{

    public function actionIndex()
    {
        $this->actionUser(self::user('id'));
    }

    public function actionUser($id)
    {
        $save = true;
        if (!empty($_POST)) {
            $checkForm = GUMP::is_valid(
                $_POST,
                [
                    'name' => 'required|max_len,500|min_len,5',
                    'description' => 'required|min_len,50',
                    'age' => 'integer|max_numeric,100|min_numeric,10',
                    'ip' => 'valid_ip',
                ]
            );

            if ($checkForm === true) {
                $_POST['id'] = $id;
                if (!empty($_FILES['userFile']) && ($_FILES['userFile']['name'] != '')) {
                    $_POST['photo'] = $_FILES['userFile']['name'];
                    $user = $this->savePhoto($_POST);
                } else {
                    $user = $_POST;
                }
                User::updateUser($user);
            } else {
                $message = '';
                foreach ($checkForm as $value) {
                    $message .= "$value<br>";
                }
                $this->message($message);
                $save = false;
            }
        }
        if ($save) {
            $user = User::getUserById($id);
            $user['ip'] = long2ip($user['ip']);
            $photo = $user['photo'];
        } else {
            $user = $_POST;
            $photo = User::getUserById($id)['photo'];
        }
        $photoLink = '';
        if ($photo) {
            $photoLink = Config::homeDir() . Config::$photoDir . $photo;
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
                ['type' =>'number', 'name' => 'age', 'label' =>'Возвраст',
                    'placeholder' => 'Возвраст', 'value' => $user['age']],
                ['type' =>'textarea', 'name' => 'description', 'label' =>'Описание', 'placeholder' => 'Описание',
                    'value' =>$user['description']],
                ['type' =>'text', 'name' => 'ip', 'label' =>'IP',
                    'placeholder' => 'IP address', 'value' => $user['ip']],
                ['type' =>'file'],

            ],
            'button' => [
                'text'              =>  'Записать',
            ]
        ];

        $this->view->generate(
            'base_view.twig',
            array(
                'title' => $user['login'],
                'content' => $this->view->viewForm($formData),
            )
        );
    }

    public static function imageResize($fileName)
    {
        // файл и новый размер
        list($width, $height) = getimagesize($fileName);

        $percent = min(Config::$image['width']/$width, Config::$image['height']/$height);

        // получение нового размера
        $newWidth = $width * $percent;
        $newHeight = $height * $percent;

        // загрузка
        $thumb = imagecreatetruecolor($newWidth, $newHeight);
        $source = imagecreatefromjpeg($fileName);

        // изменение размера
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        // вывод
        imagejpeg($thumb, $fileName);
    }

    protected function savePhoto($user)
    {

        $baseFileName = basename(filter_var($user['photo'], FILTER_SANITIZE_STRING));
        $baseName = $user['id'] . '-' . mb_strtolower($baseFileName);
        $uploadFile = Config::$photoDir . $baseName;
        if ($_FILES['userFile']["type"] == "image/jpeg") {
            if (move_uploaded_file($_FILES['userFile']['tmp_name'], $uploadFile)) {
                $this->imageResize($uploadFile);
                $user['photo'] = $baseName;
                $uploadDir = Config::$photoDir;
                $files = glob("$uploadDir{$_SESSION['idUser']}-*.{jpg}", GLOB_BRACE);
                if (count($files) > 1) {
                    foreach ($files as $value) {
                        if (baseName($value) != $baseName) {
                            unlink($value);
                        }
                    }
                }
            } else {
                unset($user['photo']);
            }
        }
        return $user;
    }

}