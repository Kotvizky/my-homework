<?php
/**
 * Created by PhpStorm.
 * User: Johnny
 * Date: 24.03.2017
 * Time: 13:54
 */

require '../vendor/autoload.php';

use \HW5\Engine;

$car = new Engine(50);

$car->start();
$car->move(300);

echo "<pre>" . print_r($car->getLog(), 1) . "</pre>";
