<?php

namespace HW52\Core;

use \PDO;
use \HW52\Config;

abstract class Model
{

    protected static function pdo()
    {
        return new PDO('mysql:host=' . Config::$dbHost .'; dbname=' . Config::$dbName, Config::$dbUser, Config::$dbPassword);
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


}