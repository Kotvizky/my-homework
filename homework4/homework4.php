<?php
namespace DataWork;

//use DOMDocument;

require_once('class/docXML.php');
require_once('class/docJSON.php');
require_once('class/docIni.php');
require_once('class/templates.php');

DocXML::createXML('./data/data.xml');

$arr =
    [
        'folders' =>
            ['conemu'=>1,
                'cron'=>2,
                'database'=>3,
                'dns'=>4,
                'ftp'=>5,
                'heidisql'=>6,
                'folder' => [
                    'ConEmu'    => 1,
                    'plugins'   => 2,
                    'ConEmu64.exe' =>  3,
                    'ConEmu.exe'   =>   4,
                    'ConEmu.xml'    =>  5

                ]
            ],
        'comment' => 'Некоторые файлы OpenDirectory',
    ];

$json = new DocJSON($arr, './data', 'output1.json', 'output2.json');
$json->saveRand();

$docXML = new DocXML('./data/data.xml');

$docIni = new DocIni('./data/data.ini', 50);

$articles = Templates::parseTpl('body', ['article' => $docXML->getContent() ]);
$articles .= Templates::parseTpl('body', ['article' => $json->show() . '<hr>' . $json->compare() ]);
$articles .= Templates::parseTpl('body', ['article' => $docIni->count() ]);



echo Templates::parseTpl('head', ['body' => $articles, 'htmlTitle' => 'Homework4']);
