<?php
/**
 * Created by PhpStorm.
 * User: Johnny
 * Date: 29.03.2017
 * Time: 11:29
 */

namespace HW5;

class TransmissionAuto extends Transmission
{
    use Reverse;

    public function setGear($gear)
    {
        if (in_array(['N','F',$this->maxReverseSpeed], $gear)) {
            $this->gear = $gear;
        } else {
            $this->gear = 'N';
        }
    }

    public function up($speed)
    {
        if ($speed < 0) {
            $speed = $this->reverse($speed);
            $this->gear = $this->reverseSymbol;
        } else {
            $this->gear = 'F';
        }
        return $speed;
    }

    public function down($speed)
    {
        $this->gear = 'N';
        return 0;
    }

}
