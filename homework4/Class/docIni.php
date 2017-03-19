<?php
/**
 * Created by PhpStorm.
 * User: Johnny
 * Date: 19.03.2017
 * Time: 13:26
 */

namespace DataWork;

class DocIni
{

    private $filename;

    public function __construct($filename, $count)
    {
        $this->filename = $filename;

        $data =[];
        for ($i = 0; $i < $count; $i++) {
            $data["number$i"] = 1;//rand(0, 100);
        }

        $this->writeIni($data);
    }

    private function writeIni($data = array())
    {
        $filename = $this->filename;

        $lineBreak = "\r\n"; //PHP_EOL

        if (is_array($data) && !empty($data)) {
            $str = '';
            foreach ($data as $key => $value) {
                if (is_array($value)) {
                    $str .= "[$key]".$lineBreak;
                    foreach ($value as $key => $value) {
                        $str .= "$key = $value".$lineBreak;
                    }
                } else {
                    $str .= "$key = $value".$lineBreak;
                }
            }
        }
        file_put_contents($filename, $str);
    }

    private function readIni()
    {
        return parse_ini_file($this->filename, 0);
    }

    public function count()
    {
        $data = $this->readIni();
        $result = 0;

        foreach ($data as $value) {
            if (($value % 2) == 0) {
                $result += $value;
            }
        }
        
        return "<p>Сумма четных чисел: $result.</p>";
    }

}