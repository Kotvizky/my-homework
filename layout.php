<?php
/**
 * @param $num - task number
 */


function printTask($num)
{
    echo '<div class = "bl" ">' .
        "<h1>Задание #$num</h1>";
    $task = 'task' . $num;
    $task();
    echo '</div>';
}


//  site layout
function htmlPage($part)
{
    global $htmlTitle;
    switch ($part) {
        case 'start':
            echo '
<!doctype html>

<html>
    <head>
        <title>'.$htmlTitle.'</title>
        <meta charset="utf-8">
        <style>
            body{
                background: #fefefe; 
            }
            .main{
                margin: 20px; 
                border: 1px solid #ccc; 
                padding: 10px; 
            }
            .bl{
                padding: 5px 10px; 
                border:1px solid #ddd; 
                background: #fffde1; 
                border-radius: 3px;
                margin: 20px;
                width: 480px;
                word-wrap: break-word;
            }

            .main {
                display:flex;
                flex-wrap: wrap;
                justify-content: center;
            }
            .borderTop{
                border-top: solid 1px;
            
//                border-top-style: solid;
//                border-top-width: 1px;
            }
            div {
                padding: 3px
            }
            p {
                margin: 0;
                padding: 0;
            }
            .multiply {
                border: 1px solid; 
                text-align : right;            
            }
            
        </style>
    </head>

    <body>
        <div class = "main">
';
            break;
        case 'end':
            echo '
        </div>
    </body>
</html>';
            break;
    }
}