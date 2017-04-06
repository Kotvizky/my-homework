<?php
//require_once dirname(__DIR__).'/lib/Twig/Autoloader.php';
//Twig_Autoloader::register();
namespace HW52\Core;

use \Twig_Environment;
use \Twig_Loader_Filesystem;
use \HW52\Config;

class View
{

    private $twig;

    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem(dirname(__DIR__).'/views');
        $twig = new Twig_Environment($loader, array('cache' => dirname(__DIR__).'/cache'));
        $twig = new Twig_Environment($loader);
        $this->twig = $twig;
    }

    public function viewForm($data)
    {
        return $this->twig->render('form.twig', $data);
    }

    public function viewTable($data)
    {
        return $this->twig->render('table.twig', $data);
    }


    public function generate($content_view, $data = null)
    {
        $data['layout'] = [
            'homeDir'    =>  Config::homeDir(),
            'title'         =>  'Homework52',
        ];

        $brand = "HW52";
        $registration = false;
        if (!empty($_SESSION['user'])) {
            $brand .= '/'.$_SESSION['user'];
            $registration = true;
        }

        $data['navBar'] =[
            'brand' => $brand,
            'items' => [
            ]
        ];

        if ($_SESSION['message']) {
            $data['message'] = $_SESSION['message'];
            unset($_SESSION['message']);
        }

        if ($registration) {
            $data['navBar']['items'] =[
                'left' => [
                    ['link' => 'profile', 'desc' => 'Профиль'],
                    ['link' => 'users', 'desc' => 'Пользователи'],
                    ['link' => 'files', 'desc' => 'Файлы'],
                ],
                'right' => [
                    ['link' => 'logoff', 'desc' => 'Выход'],
                ],
            ];
        } else {
            $data['navBar']['items'] = [
                'left' => [
                    ['link' =>  '/'             ,   'desc' => 'Вход' ],
                    ['link' =>  'registration'  ,   'desc' => 'Регистрация' ],
                ]
            ];
        };

        echo $this->twig->render($content_view, $data);
    }

}