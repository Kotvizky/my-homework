<?php

include 'layout.php';

define('CP', 'UTF-8');

//display_errors = 0;
//error_reporting(-1);
//ini_set('display_errors', 'Off');


$htmlTitle = 'Homework2'; // Title of html page;

/**
 * @param $parStr - string for printing in paragraph
 */
function printPar($parStr)
{
    echo '<p>'.$parStr.'</p>';
}

/**
 * task 1
 * String array
 */
function task1()
{
    function printArray($arr, $common = false)
    {
        if ($common) {
            $res = '';
            foreach ($arr as $value) {
                $res .= $value;
            }
            printPar($res);
        } else {
            foreach ($arr as $value) {
                printPar($value);
            }
        }
    }

    $arrStr = explode(' ', 'Функция должна принимать массив строк и выводить каждую строку в отдельном параграфе');
    echo '<pre>Исхоный массив:'."\n";
    print_r($arrStr);
    echo '</pre>';

    echo "<div class='borderTop'>";
    PrintPar('Вывод объедененного массива в строку функцией printArray($arr, $common = false):');
    printArray($arrStr, true);
    echo '</div>';

    echo "<div class='borderTop'>";
    PrintPar('Вывод массива отдельными параграфами функцией printArray($arr, $common = false):');
    printArray($arrStr);
    echo '</div>';
}

function task2()
{
    /**
     * @param $arrInput
     * @param $operator
     */

    echo '<div>';
    for ($i = 0; $i < 5; $i++) {
        $arrInput[] = rand(0, 100) / 10;
    }
    $arrInput[] = 0;
    $operator = '/';
    printPar('Оператор: '.$operator.'; входной массив:'.implode('; ', $arrInput));
    mathArray($arrInput, $operator);
    echo '</div>';

    echo '<div class="borderTop">';
    unset($arrInput);
    for ($i = 0; $i < 5; $i++) {
        $arrInput[] = rand(0, 100) / 10 ;
    }
    $operator = '*';
    printPar('Оператор: '.$operator.'; входной массив:'.implode('; ', $arrInput));
    mathArray($arrInput, $operator);
    echo '</div>';

    echo '<div class="borderTop">';
    unset($arrInput);
    for ($i = 0; $i < 5; $i++) {
        $arrInput[] = rand(0, 100) / 10 ;
    }
    $operator = '!';
    printPar('Оператор: '.$operator.'; входной массив:'.implode('; ', $arrInput));
    mathArray($arrInput, $operator);
    echo '</div>';

}

/**
 * task 3
 */
function task3()
{
    function calcArguments()
    {
        $arrInput = func_get_args();
        $operator = $arrInput[0];
        unset($arrInput[0]);
        mathArray($arrInput, $operator);
    }

    echo '<div>';
    $arrInput[] = '/';
    for ($i = 0; $i < 5; $i++) {
        $arrInput[] = rand(0, 100) / 10;
    }
    printPar('Входной массив:'.implode('; ', $arrInput));
    calcArguments($arrInput[0], $arrInput[1], $arrInput[1], $arrInput[2], $arrInput[3], $arrInput[4], $arrInput[5]);
    echo '</div>';

    unset($arrInput);
    echo '<div class="borderTop">';
    $arrInput[] = '+';
    for ($i = 0; $i < 5; $i++) {
        $arrInput[] = rand(0, 100) / 10;
    }
    printPar('Входной массив:'.implode('; ', $arrInput));
    calcArguments($arrInput[0], $arrInput[1], $arrInput[1], $arrInput[2], $arrInput[3], $arrInput[4], $arrInput[5]);
    echo '</div>';

}

function task4()
{
    /**
     * @param $n
     * @return bool
     */
    function checkParam($n)
    {
        if (($n < 1) || ($n > 8)) {
            printPar("Эначение параметра $n не входит в расчетный диапозон.");
            return false;
        }
        return true;
    }

    function multTable($n1, $n2)
    {


        if (checkParam($n1) & checkParam($n2)) {
            echo '<table class = "multiply">';
            for ($row = 1; $row <= $n1; $row++) {
                if ($row == 1) {
                    echo '<thead style="background-color: lightgray;border-style: none">';
                }
                echo '<tr>';
                for ($col = 1; $col <= $n2; $col++) {
                    $dataStr = strval($row * $col);
                    echo "<td>$dataStr</td>";
                }
                echo "</tr>";
                if ($row == 1) {
                    echo '</thead>';
                }
            }
            echo '</table>';
        }
    }

    $n1 = 0;
    $n2 = 5;
    echo '<div>';
    printPar("Таблица умножения $n1 x $n2 ");
    multTable($n1, $n2);
    echo '</div>';

    $n1 = 7;
    $n2 = 8;
    echo '<div class="borderTop">';
    printPar("Таблица умножения $n1 x $n2 ");
    multTable($n1, $n2);
    echo '</div>';

}

function task5()
{
    function isPalindrome($str)
    {
        $str = str_replace(' ', '', $str);
        $str = mb_strtolower($str, CP);
        $len = mb_strlen($str, CP);
        $res = true;
        for ($i = $len - 1; $i >= 0; $i--) {
            if (mb_substr($str, $len-$i-1, 1, CP) != mb_substr($str, $i, 1, CP)) {
                $res = false;
                break;
            }
        }
        return $res;
    }

    function answer($str, $res)
    {
        if ($res) {
            printPar('"'.$str.'" - это палиндром');
        } else {
            printPar('"'.$str.'" - это не палиндром!');
        }
    }

    echo '<div>';
    $str = 'А роза упала на лапу азора1';
    answer($str, isPalindrome($str));
    echo '</div>';

    echo '<div class = "borderTop">';
    $str = 'А роза упала на лапу азора';
    answer($str, isPalindrome($str));
    echo '</div>';

}

function task6()
{
    printPar('Текущее время: '.date('d.m.Y H:i'));
    echo '<p class="borderTop">Выведите unixtime время соответствующее 24.02.2016 00:00:00: <br>'
        . mktime(0, 0, 0, 2, 24, 2016).'</p>';
}

/**
 * task7
 */
function task7()
{
    echo '<div>';
    $str = 'Карл у Клары украл Кораллы';
    mb_regex_encoding(CP);
    $answer = mb_ereg_replace('К', "", $str);
    printPar("Удалить все заглавные буквы \"К\": <br> \"$str\" <br> \"$answer\"");
    echo '</div>';

    echo '<div class="borderTop">';
    $str = 'Две бутылки лимонада';
    mb_regex_encoding(CP);
    $answer = mb_ereg_replace('Две', "Три", $str);
    printPar("Заменить \"Две\"  на \"Три\": <br> \"$str\" <br> \"$answer\"");
    echo '</div>';

}

/**
 * task8
 */
function task8()
{
    function smile()
    {
        echo '<pre>
          Cb     
db         `8b   
VP           8b  
   C8888D    88D 
db           8P  
VP         .8P   
          CP     
</pre>';
    }

    function netTest($str)
    {
        if (preg_match('/:\)/', $str)) {
            smile();
        } else {
            if (preg_match('/RX packets:[\s]{1,}[0-9]{1,}/', $str, $matches)) {
                preg_match('/[0-9]{1,}/', $matches[0], $amount);
                if ($amount[0] > 100) {
                    printPar('Есть связь!');
                }
            }
        }
    }

    echo '<div>';
    $str = 'RX packets:   950381 errors:0 dropped:0 overruns:0 frame:0 :)';
    printPar("\"$str\" : ");
    netTest($str);
    echo '</div>';

    echo '<div class="borderTop">';
    $str = 'RX packets:   950381 errors:0 dropped:0 overruns:0 frame:0 ';
    printPar("\"$str\" : ");
    netTest($str);
    echo '</div>';

    echo '<div class="borderTop">';
    $str = 'RX packets:   95 0381 errors:0 dropped:0 overruns:0 frame:0 ';
    printPar("\"$str\" : ");
    netTest($str);
    echo '</div>';

}


function task9()
{
    echo '<pre>';
    $fname = 'files/test.txt';
    fMyOpen($fname);
    echo '</pre>';
}

function task10()
{
    $file = 'files/anothertest.txt';
    $str = 'Hello again! (' . rand(1, 10) . ')';
    fMyWrite($file, $str);
    printPar('Проверка:');
    fMyOpen($file);
}

/**
 * @param $arrInput
 * @param $operator
 */
function mathArray($arrInput, $operator)
{
    switch ($operator) {
        case '+':
            $result = 0;
            foreach ($arrInput as $value) {
                $result = +$value;
            }
            break;
        case '-':
            $first = true;
            foreach ($arrInput as $value) {
                if ($first) {
                    $result = $value;
                    $first = false;
                } else {
                    $result = -$value;
                }
            }
            break;
        case '/':
            $first = true;
            foreach ($arrInput as $value) {
                if ($first) {
                    $result = $value;
                    $first = false;
                } else {
                    if ($value == 0) {
                        echo 'Ошибка деления на 0!';
                        return;
                    } else {
                        $result = $result / $value;
                    }
                }
            }
            break;
        case '*':
            $first = true;
            foreach ($arrInput as $value) {
                if ($first) {
                    $result = $value;
                    $first = false;
                } else {
                    $result = $result * $value;
                }
            }
            break;
        default:
            printPar('Неизвестный арифметический оператор');
            return;
    }
    printPar('Результат: ' . $result);
}


function fMyOpen($name)
{
    if (file_exists($name)) {
        $str = file_get_contents($name);
        printPar($str);
    }
}

function fMyWrite($file,$str)
{
    if (file_exists($file)) {
        unlink($file);
    }
    file_put_contents($file, $str);
}

$htmlTitle = 'Homework2'; // HTML page title

htmlPage('start');
//printTask(10);
for ($task = 1; $task <= 10; $task++) {
    printTask($task);
}
htmlPage('end');
