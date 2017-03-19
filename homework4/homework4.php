<?php
namespace DataWork;

//use DOMDocument;

require_once('docXML.php');
require_once('docJSON.php');
require_once('templates.php');
//use DataWork\DocXML,DataWork\docJSON,DataWork\Templates;

//define('TPL', 'tpl'); // tpl folder

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

$articles = Templates::parseTpl('body', ['article' => $docXML->getContent()]);
$articles .= Templates::parseTpl('body', ['article' => $json->show() . $json->compare() ]);


echo Templates::parseTpl('head', ['body' => $articles, 'htmlTitle' => 'Homework4']);
