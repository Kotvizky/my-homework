<?php

namespace HW52\Controllers;

use \HW52\Core\Controller;
use \HW52\Config;
use HW52\Models\ModelUsers;

class ControllerFiles extends Controller
{

    public function actionIndex()
    {

        $uploadDir = Config::$photoDir;
        $files = [];
        foreach (glob("$uploadDir*.{jpg}", GLOB_BRACE) as $file) {
            $fileName = baseName($file);
            $files[] = [
                'name' => $fileName,
                'photo' => ['img' => Config::homeDir() . Config::$photoDir . $fileName],
                'link' => [
                    'link' => "files/delete/" . str_replace('.jpg', '', $fileName),
                    'comment' => 'Удалить аватарку пользователя?',
                ],
            ];
        }

        $TableData = [
            'head' => [
                'Название файла',
                'Фотография',
                'Действия',
            ],
        ];

        $TableData['rows'] = $files;

        $this->view->generate('base_view.twig',
            [
                'title' => 'Список файлов',
                'content' => $this->view->viewTable($TableData),
            ]
        );
    }

    public function actionDelete($file)
    {
        if (strripos($file, '/') || strripos($file, '\\')) {
            $this->message("Некоректное имя файла $file");
        }
        $file .= '.jpg';
        if (file_exists(Config::$photoDir . $file)) {
            if (unlink(Config::$photoDir . $file)) {
                $idEndPosition = strpos($file, '-');
                if ($idEndPosition) {
                    $id = (int)substr($file, 0, $idEndPosition);
                    if ($id) {
                        ModelUsers::updateUser("photo = ''", $id, "photo = '$file'");
                    }
                }
                $this->message("Фото $file удалено из базы");
            } else {
                $this->message("Произошла ошибка при удалении $file из базы");
            }
        } else {
            $this->message("Файл $file не найден");
        }
        header('Location: /files');
    }
}