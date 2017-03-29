<?php
/**
 * Created by PhpStorm.
 * User: Johnny
 * Date: 29.03.2017
 * Time: 13:48
 */

namespace HW5;

abstract class Transmission
{
    protected $gear = 'N';

    public function getGear()
    {
        return $this->gear;
    }

    abstract public function setGear($speed);

    abstract public function up($speed);

    abstract public function down($speed);


}