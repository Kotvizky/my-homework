<?php
/**
 * Created by PhpStorm.
 * User: Johnny
 * Date: 19.03.2017
 * Time: 13:26
 */

namespace DataWork;

class DocCsv
{

    private $filename;

    public function __construct($filename, $count)
    {
        $this->filename = $filename;

        $data =[];
        for ($i = 0; $i < $count; $i++) {
            $data["number$i"] = rand(0, 100);
        }

        $this->writeCsv($data);
    }

    private function writeCsv($data = array())
    {
        $filename = $this->filename;
        if (is_array($data) && !empty($data)) {
            $fp = fopen($filename, 'w');
            fputcsv($fp, $data);
            fclose($fp);
        }
    }

    private function readCsv()
    {
        $csvPath = $this->filename;
        $csvFile = fopen($csvPath, "r");
        if ($csvFile) {
            $res = array();
            while (($csvData = fgetcsv($csvFile, 400, ",")) !== false) {
                $res[] = $csvData;
            }
//            echo '<pre>';
//            print_r($res);
        }
        return $res;
    }

    public function count()
    {
        $data = $this->readCsv();
        $result = 0;

        foreach ($data as $row) {
            foreach ($row as $value) {
                if (($value % 2) == 0) {
                    $result += $value;
                }
            }
        }

//        return "<pre>". print_r($data,1). "</pre>";

        return "<p>Сумма четных чисел: $result.</p>";
    }

}