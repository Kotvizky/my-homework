<?php
/**
 * Created by PhpStorm.
 * User: Johnny
 * Date: 29.03.2017
 * Time: 14:12
 */

namespace HW5;

class TransmissionManual extends Transmission
{
    use Reverse;

    private $levels = [
        1 =>  [0,20],
        2 =>  [20,0]
    ];


    public function setGear($gear)
    {
        if ((is_int($gear) && ($gear > 0) && ($gear < count($this->levels))) || ($gear == $this->reverseSymbol)) {
            $this->gear = $gear;
        } else {
            $this->gear = 'N';
        }
    }

    public function getGear()
    {
        return $this->gear;
    }

    public function up($speed)
    {
        if ($speed<0) {
            $this->gear = $this->reverseSymbol;
            return $this->reverse($speed);
        }


        if ($this->gear == 'N') {
            $this->gear = 1;
        } elseif ($this->gear < count($this->levels)) {
            $this->gear++;
        }
        $minSpeed = $this->levels[$this->gear][0];
        $maxSpeed = $this->levels[$this->gear][1];
        $speed = max($speed, $minSpeed);
        if ($maxSpeed != 0) {
            $speed = min($speed, $maxSpeed);
        }
        return $speed;
    }

    public function down($speed)
    {
        if (in_array($this->gear, [1, 'N', $this->reverseSymbol])) {
            $this->gear = 'N';
            $speed = 0;
        } else {
            $this->gear--;
            $speed = $this->levels[$this->gear][0];
        }
        return $speed;
    }


}
