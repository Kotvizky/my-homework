<?php

namespace MyApp;

class Config
{
    public static $dbHost = 'localhost';
    public static $dbName = 'hw6';
    public static $dbUser = 'root';
    public static $dbPassword = '';
    public static $photoDir ='photos/';
    public static $image = [ 'height' =>450 , 'width' => 450];
    public static $adminControllers = ['users','files'];
    public static $reCaptcha = [
            'siteKey'   => "6Lcs2hsUAAAAAOuWGE5KA0iAULRn_c44RD1TmiGy",
            'secretKey' => "6Lcs2hsUAAAAADacMoSzLgHR5NVQgiqPEffrr2PD",
            'lang'      => 'ru',
        ];
    public static $emailFrom = 'lstest2017@gmail.com';
    public static $watermarkFile = 'image45.jpg';
    public static $connection = [
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => 'hw6',
        'username'  => 'root',
        'password'  => '',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ];


    public static function homeDir()
    {
        return str_replace('index.php', '', $_SERVER['PHP_SELF']);
    }

}