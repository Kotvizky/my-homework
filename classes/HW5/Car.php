<?php
/**
 * Created by PhpStorm.
 * User: Johnny
 * Date: 24.03.2017
 * Time: 13:55
 */

namespace HW5;

class Car extends Engine
{
    protected $curSpeed = 0;
    protected $curDistance = 0;


    protected $transmission  ;

    public function __construct($transmission, $power)
    {
        parent::__construct($power);
        if ($transmission == 'auto') {
            $this->transmission = new TransmissionAuto();
        } else {
            $this->transmission = new TransmissionManual();
        }
    }

    public function drive($speed, $distance)
    {
        $speed = min($speed, $this->maxSpeed);
        $this->start();
        $this->log['start'][] = $this->getCarLog(true);

        do {
            $this->curSpeed = $this->transmission->up($speed);
            $this->log['start'][] = $this->getCarLog(true);
            if ($speed < 0) {
                break;
            }
        } while ($this->curSpeed<$speed);

        $this->move($distance);

        $this->curDistance += $distance;

        $this->log['finish'][] = $this->getCarLog(true);

        do {
            $this->curSpeed = $this->transmission->down($speed);
            $this->log['finish'][] = $this->getCarLog();
        } while ($this->transmission->getGear() != 'N');

        $this->stop();
    }

    public function getCarLog($withDistance = false)
    {
        $log = [
            'gear' => $this->transmission->getGear(),
            'speed' => $this->curSpeed,
        ];
        if ($withDistance) {
            $log['curDistance'] = $this->curDistance;
        }
        return $log;
    }


}