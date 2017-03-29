<?php
/**
 * Created by PhpStorm.
 * User: Johnny
 * Date: 29.03.2017
 * Time: 17:37
 */

namespace HW5;

trait Reverse
{
    protected $maxReverseSpeed = -30;
    protected $reverseSymbol = 'R';

    protected function reverse($speed)
    {
        $speed = min(0, $speed);
        $speed = max($this->maxReverseSpeed, $speed);
        return $speed;
    }
}