<?php

namespace MyApp\Controllers;

use MyApp\Core\Controller;
use MyApp\Config;
use MyApp\Models\User;
use Intervention\Image\ImageManagerStatic as Image;

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
                'link' =>
                    ['link' => [
                        [
                            'link' => "files/delete/" . str_replace('.jpg', '', $fileName),
                            'comment' => 'Удалить аватарку пользователя?',
                        ],
                        [
                            'link' => "files/watermark/" . str_replace('.jpg', '', $fileName),
                            'comment' => 'Поместить водяной знак?',
                        ],
                    ],
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

        $this->view->generate(
            'base_view.twig',
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
                        $user = User::getUserById($id);
                        if ($file = $user['photo']) {
                            User::updateUser(
                                [
                                    'id' => $id,
                                    'photo' => $file,
                                ]
                            );
                        }
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

    public function actionWatermark($file)
    {
        if (strripos($file, '/') || strripos($file, '\\')) {
            $this->message("Некоректное имя файла $file");
        }
        $file = Config::$photoDir . "$file.jpg";
        if (file_exists($file)) {
            putenv('GDFONTPATH=' . realpath('.'));
            $image = Image::make($file);

            $image->rotate(45, '#FFFFFF')
                ->text("HW6", $image->width() / 2, $image->height() / 2, function ($font) {
                    $font->file(Config::$photoDir .'arial.ttf');
                    $font->size('100');
                    $font->color(array(255, 0, 0, 0.5));
                    $font->align('center');
                    $font->valign('center');
                })
                ->resize(200, null, function ($image) {
                    $image->aspectRatio();
                })
                ->save(Config::$photoDir . Config::$watermarkFile);

            $this->view->generate(
                'base_view.twig',
                [
                    'title' => 'Картинка с водяным знаком!',
                    'content' => "<img src =" .  Config::homeDir() . Config::$photoDir . Config::$watermarkFile . ">",
                ]
            );
        } else {
            $this->message("Файл $file не найден!");
            header('Location: /files');
        }
    }
}