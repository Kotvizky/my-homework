<?php
/**
 * Created by PhpStorm.
 * User: Johnny
 * Date: 24.03.2017
 * Time: 13:54
 */

require '../vendor/autoload.php';

use \HW5\Car;

$loader = new Twig_Loader_Filesystem('../views/HW5');
$twig = new Twig_Environment($loader);


$message = false;
$form = false;

if (!empty($_POST)) {
    $form = $_POST;
    $car = new Car($form['transmission'], $form['power']);
    $car->drive($form['speed'], $form['distance']);

    $message = print_r($car->getLog(), 1);
}

echo $twig->render('index.html',
    array(
        'title'=>'My car',
        'brand'=>'My car',
        'message' => $message,
        'form' => $form,
    )
);

