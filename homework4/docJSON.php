<?php
/**
 * Created by PhpStorm.
 * User: Johnny
 * Date: 19.03.2017
 * Time: 8:00
 */

namespace DataWork;

class DocJSON
{
    private $comparePart;
    private $fileName1;
    private $fileName2;

    public function __construct($arr, $path, $fileName1, $fileName2)
    {
        $this->fileName1 = "$path/$fileName1";
        $this->fileName2 = "$path/$fileName2";
        $jsonString = json_encode($arr, JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT);
        file_put_contents($this->fileName1, $jsonString);
        $this->comparePart = 'folders';
    }

    public function show()
    {
        $jsonFile = file_get_contents($this->fileName1);
        $jsonArray = json_decode($jsonFile, true);
        return "<pre>" . print_r($jsonArray, true) . "</pre>";
    }

    public function saveRand()
    {
        $arr = json_decode(file_get_contents($this->fileName1), frue);
        if (rand(0, 1)) {
            $newVal = rand(0, 100);
            $ranKey = array_keys($arr[$this->comparePart]) [rand(0, count($arr[$this->comparePart]) - 2)];
            $arr[$this->comparePart][$ranKey] = $newVal;
            $arr['folders']['folder']['ConEmu'] = 7;
        }
        file_put_contents($this->fileName2, json_encode($arr, JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT));
    }

    public function compare()
    {
        $arr1 = json_decode(file_get_contents($this->fileName1), frue);
        $arr2 = json_decode(file_get_contents($this->fileName2), frue);

        return "<pre>" . $this->compareArray($arr1, $arr2, ".") . "</pre>";
    }

    public function compareArray($arr1, $arr2, $level)
    {
        $result ='';
        foreach ($arr1 as $key => $value) {
            if (is_array($arr1[$key])) {
                $result .= $this->compareArray($arr1[$key], $arr2[$key], "$level/$key");
            }
        }
        $arrResult = array_diff($arr1, $arr2);

        if (!empty($arrResult)) {
            $arrCompare = [];
            $keys = array_keys($arrResult);
            foreach ($keys as $value) {
                $arrCompare[$value] = ['oldValue' => $arrResult[$value],
                    'newValue' => $arr2[$value]];
            }
            $result .= "\n\nАдрес: $level\n" . print_r($arrCompare, 1);
        }
        return $result;
    }


}