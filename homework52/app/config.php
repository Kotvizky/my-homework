<?php

namespace HW52;

class Config
{
    public static $dbHost = 'localhost';
    public static $dbName = 'hw3';
    public static $dbUser = 'root';
    public static $dbPassword = '';
    public static $photoDir ='photos/';
    public static $image = [ 'height' =>250 , 'width' => 250];
    public static function homeDir()
    {
        return substr(str_replace('index.php', '', $_SERVER['PHP_SELF']), 1);
    }

}