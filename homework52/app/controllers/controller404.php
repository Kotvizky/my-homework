<?php
/**
 * Created by PhpStorm.
 * User: Johnny
 * Date: 05.04.2017
 * Time: 14:09
 */

namespace HW52\Controllers;

use \HW52\Core\Controller;


class controller404 extends Controller
{

    public function actionIndex()
    {
        $this->view->generate('base_view.twig',
            array(
                'title' => 'Ошибка 404!',
                'content' => 'Данной страницы не существует!!!'
            )
        );
    }

}