<?php
namespace DataWork;

//use DOMDocument;

require_once('class/docXML.php');
require_once('class/docJSON.php');
require_once('class/docCsv.php');
require_once('class/getCurl.php');
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

$docCsv = new DocCsv('./data/data.csv', 50);

$url = 'https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json';

$getCurl = new GetCurl($url);

$articles = Templates::parseTpl('body', ['article' => $docXML->getContent(),
    'TaskNum' => 1 ]);
$articles .= Templates::parseTpl('body', ['article' => $json->show() . '<hr>' . $json->compare(),
    'TaskNum' => 2 ]);
$articles .= Templates::parseTpl('body', ['article' => $docCsv->count(),
    'TaskNum' => 3 ]);
$articles .= Templates::parseTpl('body', ['article' =>
    Templates::parseTpl('pageInfo', ['pageId' => $getCurl->getPageInfo()['pageId'],
            'title' => $getCurl->getPageInfo()['title']]),
    'TaskNum' => 4 ]);




echo Templates::parseTpl('head', ['body' => $articles, 'htmlTitle' => 'Homework4']);
