<?php


/**
 * task 1 function
 */
function task1()
{
    $name = "Евгений";
    $age = 40;
    echo "Меня зовут $name<br>";
    echo "Мне $age лет<br>";
    echo '“!|\/’"\\'.'<br>';
}

/**
 * tast 2 function
 */
function task2(){
    $total = 80;
    $marker = 23;
    $pencil = 40;
    $paint = $total - $marker - $pencil;
    echo
        '<h3>Условие</h3>'.
        "<p>На школьной выставке $total рисунков. ".
        "$marker из них выполнены фломастерами, ".
        "$pencil карандашами, а остальные — красками.</p>".
        '<p>Пусть Х - это количество рисунков красками.<br>'.
        ' Тогда 23 + 40 + Х = 80;<br>'.
        'Х = 80-(23 + 40);</br>'.
        "Х = $total.</p>".
        '<h3>Ответ</h3>'.
        "<p>Красками выполнено $paint рисунков.</p>";
}

/**
 * task 3
 */
function task3()
{
    define("CONSTANT", "Моя константа");
    if (defined("CONSTANT")) {
        echo '<p>Значение "CONSTANT" - "'.CONSTANT.'"!</p>';
    } else {
        echo '<p>Константа "CONSTANT" не найдена!</p>';
    }
    $newValue = 'Новое значение';
    define("CONSTANT", $newValue);
    if (CONSTANT != $newValue) {
        echo '<p> CONSTANT = "'.CONSTANT.'", это старое значние</p>';
    } else {
        echo '<p> CONSTANT = "'.CONSTANT.'", это новое зачение</p>';
    }
}

/**
 * task 4
 */
function task4()
{
    $age = rand(0, 100);
    echo "<p>Возвраст: $age </p>";
    if (($age >= 18) & ($age <= 65)) {
        echo '<p>Вам еще работать и работать!</p>';
    } elseif ($age > 65) {
        echo '<p>Вам пора на пенсию.</p>';
    } elseif (($age >= 1) & ($age <= 17)) {
        echo '<p>Вам еще рано работать.</p>';
    } else {
        echo '<p>Неизвестный возвраст.</p>';
    }
}

/**
 * task 5
 */
function task5()
{
    $day = rand(0, 10);
    echo "<p>День: $day </p>";

    switch ($day) {
        case 1:
            echo '<p>Это рабочий день</p>';
            break;
        case 2:
            echo '<p>Это рабочий день</p>';
            break;
        case 3:
            echo '<p>Это рабочий день</p>';
            break;
        case 4:
            echo '<p>Это рабочий день</p>';
            break;
        case 5:
            echo '<p>Это рабочий день</p>';
            break;
        case 6:
            echo '<p>Это выходной день</p>';
            break;
        case 7:
            echo '<p>Это выходной день</p>';
            break;
        default:
            echo '<p>Неизвестный день</p>';
    }
}

/**
 * task 6
 */
function task6()
{
    $bmw['model']='X5';
    $bmw['speed']='120';
    $bmw['doors']='5';
    $bmw['year']='2015';

    $tayota['model']='Camry';
    $tayota['speed']='110';
    $tayota['doors']='5';
    $tayota['year']='2014';

    $opel['model']='Astra';
    $opel['speed']='115';
    $opel['doors']='5';
    $opel['year']='2016';

    $cars['bmw'] = $bmw;
    $cars['tayota'] = $tayota;
    $cars['opel'] = $opel;

    foreach ($cars as $key => $value) {
        echo "<p style='border:1px solid; '>CAR $key<br>".
            "{$value['model']} {$value['speed']} {$value['doors']} {$value['year']}</p>";
    }
}

/**
 *  task7
 */
function task7()
{
    echo '<table style="border: 1px solid; text-align : right">';
    for ($row = 1; $row < 11; $row++) {
        if ($row == 1) {
            echo '<thead style="background-color: lightgray;border-style: none">';
        }
        echo '<tr>';
        for ($col = 1; $col < 11; $col++) {
            $data = $row*$col;
            if (($col == 1)||($row == 1)) {
                $dataStr = strval($data);
            } elseif ($data%2 ==0) {
                $dataStr = "($data)";
            } else {
                $dataStr = "[$data]";
            }
            echo "<td>$dataStr</td>";
        }
        echo "</tr>";
        if ($row == 1) {
            echo '</thead>';
        }
    }
    echo '</table>';
}

/**
 * task 8
 */
function task8()
{
    $str = 'Создайте переменную $str, которой присвойте строковое значение';
    echo "<p>$str</p>";
    $arrStr = explode(' ', $str);
    echo '<div><pre>';
    print_r($arrStr);
    echo '</pre></div>';
    echo '<p>';
    $len = count($arrStr);
    $i = 0;
    $res = '';
    do {
        if ($i == $len - 2) {
            $res .=$arrStr[$i];
        } else {
            $res .=$arrStr[$i].'*';
        }
        $i++;
    } while ($i < $len);
    echo "<p>$res</p>";
}

function printTask($num)
{
    echo '<div style="border:1px solid; margin: 10px 20px; padding: 10px ">'.
        "<h1>Задание #$num</h1>";
    $task = 'task'.$num;
    $task();
    echo '</div>';
}

for ($task = 1; $task < 9; $task++) {
    printTask($task);
}
