<?php

namespace MyApp\Core;

use \PDO;
use MyApp\Config;
use Illuminate\Database\Capsule\Manager as Capsule;

abstract class Model
{

    public static function initDB()
    {
        $capsule = new Capsule;

        $capsule->addConnection(Config::$connection);

        // Make this Capsule instance available globally via static methods... (optional)
        $capsule->setAsGlobal();

        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $capsule->bootEloquent();
    }

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