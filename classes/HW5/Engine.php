<?php
/**
 * Created by PhpStorm.
 * User: Johnny
 * Date: 25.03.2017
 * Time: 14:24
 */

namespace HW5;

class Engine
{
    const SPEED_HORSES = 2;
    const MIN_PERIOD_M = 10;
    const TEMP_INC_GR = 5;
    const TEMP_DCR_GR = 10;
    const TEMP_MAX_GR = 90;
    const TEMP_MIN_GR = 70;

    protected $power;
    protected $maxSpeed;

    protected $temperature = 25;
    protected $start = false;
    protected $cooling = false;
    protected $distance = 0;
    protected $log = [];

    public function __construct($power)
    {
        $this->power = $power;
        $this->maxSpeed = $power/self::SPEED_HORSES;
    }

    public function getPower()
    {
        return $this->power;
    }

    public function start()
    {
        $this->start = true;
    }

    public function stop()
    {
        $this->start = false;
    }

    public function getLog() //: array
    {
        return $this->log;
    }

    public function move($distance)
    {
        $this->log = [];
        if ($this->start) {
            $this->distance = 0;
            while ($distance > $this->distance) {
                $this->makeStep($distance);
            }
            $this->addReportPoint();
        } else {
            $this->log[] = ['report' => 'Engine isn\'t ON'];
        }
    }

    protected function makeStep($distance)
    {
        $distance = min(self::MIN_PERIOD_M, $distance - @$this->distance);
        if (($this->temperature >= self::TEMP_MAX_GR) && !$this->cooling) {
            $this->cooling = true;
            $this->addReportPoint();
        } elseif (($this->temperature <= self::TEMP_MIN_GR) && $this->cooling) {
            $this->cooling = false;
            $this->addReportPoint();
        }
        $this->distance += $distance;
        $this->temperature -= $this->cooling * self::TEMP_DCR_GR * $distance/self::MIN_PERIOD_M;
        $this->temperature += self::TEMP_INC_GR * $distance/self::MIN_PERIOD_M;
    }

    protected function addReportPoint()
    {
        $this->log[] = [
            'distance'  =>  $this->distance,
            'tempGrad'  =>  $this->temperature,
            'cooling'   =>  $this->cooling,
        ];
    }

}