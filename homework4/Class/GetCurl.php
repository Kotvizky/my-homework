<?php
/**
 * Created by PhpStorm.
 * User: Johnny
 * Date: 19.03.2017
 * Time: 14:53
 */

namespace DataWork;


class GetCurl
{
    private $url;
    private $data;
    private $pageInfo = [];

    private $intoTpl = ['pageId' => 'pageid', "title" => 'title'];

    public function getPageInfo()
    {
        return $this->pageInfo;
    }

    public function printPageInfo()
    {
        return "<pre>" . print_r($this->pageInfo, 1) ."</pre>";
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getData()
    {
        return $this->data;
    }

    public function __construct($url)
    {
        $this->url = $url;
        $this->getUrlData();
        $this->setPageInfo();
    }

    private function getUrlData()
    {
        $url = $this->url;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $this->data = curl_exec($curl);
        curl_close($curl);
    }

    private function setPageInfo()
    {
        $dataArr = json_decode($this->data, 1);
        $this->seekPageInfo($dataArr);
    }

    private function seekPageInfo($data)
    {
        $result = false ;

        foreach ($data as $value) {
            if (is_array($value)) {
                if (!empty($value[$this->intoTpl['pageId']])) {
                    $this->pageInfo['pageId'] = $value[$this->intoTpl['pageId']];
                    $this->pageInfo['title'] = $value[$this->intoTpl['title']];
                    $result = true;
                    break;
                } else {
                    $result = $this->seekPageInfo($value);
                    if ($result) {
                        break;
                    }
                }
            }
        }
        return $result;
    }

}