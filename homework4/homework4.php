<?php


require_once('docXML.php');
require_once('templates.php');
use DataWork\DocXML,DataWork\Templates;

//define('TPL', 'tpl'); // tpl folder

DocXML::createXML('./data/data.xml');

$dom = new DOMDocument('1.0', 'UTF-8');

$docXML = new DocXML('./data/data.xml');

$article = Templates::parseTpl('body', ['article' => $docXML->getContent()]);

echo Templates::parseTpl('head', ['body' => $article, 'htmlTitle' => 'Homework4']);
