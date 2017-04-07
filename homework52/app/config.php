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
    public static $adminControllers = ['users','files'];
    public static $reCaptcha = [
            'siteKey'   => "6Lcs2hsUAAAAAOuWGE5KA0iAULRn_c44RD1TmiGy",
            'secretKey' => "6Lcs2hsUAAAAADacMoSzLgHR5NVQgiqPEffrr2PD",
            'lang'      => 'ru',
        ];
    public static $emailFrom = 'lstest2017@gmail.com';
    public static $watermarkFile = 'image45.jpg';

    public static function homeDir()
    {
        return str_replace('index.php', '', $_SERVER['PHP_SELF']);
    }

}