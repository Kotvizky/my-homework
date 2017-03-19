<?php
/**
 * Created by PhpStorm.
 * User: Johnny
 * Date: 18.03.2017
 * Time: 10:56
 */

namespace DataWork;

use DOMDocument;

class DocXML
{
    private $xml;
    public $filePath;
    public $content = '';

    public function __construct($path)
    {
        $this->filePath = $path;
        $this->xml = simplexml_load_file($path);
        $content = ['title' => $this->getList($this->xml->attributes())];

        foreach ($this->xml->Address as $value) {
            $addressType = $value->attributes()['Type'];
            if (in_array($addressType, ['Shipping', 'Billing'])
                && (count($value) > 1)) {
                $content["address$addressType"] = $this->getList($value);
            }
        }

        if ($this->xml->DeliveryNotes) {
            $content['DeliveryNotes'] = $this->xml->DeliveryNotes;
        } else {
            $content['DeliveryNotes'] = '';
        }

        $content['rowItems'] =  $this->getTableItems($this->xml->Items->children());
        $this->content .= Templates::parseTpl('xmlDoc', $content);
    }

    private function getTableItems($data)
    {
        $content = '';
        $td =['ProductName', 'Quantity', 'USPrice','ShipDate' ,'Comment',];
        foreach ($data as $value) {
            $items = array();
            $items['PartNumber'] = $value->attributes()['PartNumber'];
            foreach ($td as $rowName) {
                if (($rowName == 'ShipDate') && !empty($value->$rowName)) {
                    $items[$rowName] = $this->convertData($value->$rowName);
                } else {
                    $items[$rowName] = $value->$rowName;
                }
            }
            $content .= Templates::parseTpl('rowItems', $items);
        }
        return $content;
    }

    private function getList($date)
    {
        $content = '';
        foreach ($date as $key => $value) {
            if (!is_array($value)) {
                if ($key == 'OrderDate') {
                    $value = $this->convertData($value);
                }
                $content .= Templates::parseTpl('listElementXml', ['dt' => $key, 'dd' => $value]);
            }
        }
        return $content;
    }

    private function convertData($date)
    {
        $date = explode('-', $date);
        return "{$date[2]}.{$date[1]}.{$date[0]}";
    }



    public function showXML()
    {
        return '<pre>'.print_r($this->xml, 1).'</pre>';
    }

    public function getContent()
    {
        return $this->content;
    }

    public static function createXML($path)
    {
        $dom = new DOMDocument('1.0', 'UTF-8');

        $Shipping = [
            'name' => 'Address',
            'attr' => ['Type' => "Shipping"],
            'children' => [
                'Name' => 'Ellen Adams',
                'Street' => '123 Maple Street',
                'City' => 'Mill Valley',
                'State' => 'CA',
                'Zip' => '10999',
                'Country' => 'USA',
            ]
         ];

        $Billing = [
            'name' => 'Address',
            'attr' => ['Type' => "Billing"],
            'children' => [
                'Name' => 'Tai Yee',
                'Street' => '8 Oak Avenue',
                'City' => 'Old Town',
                'State' => 'PA',
                'Zip' => '95819',
                'Country' => 'USA',
            ]
        ];

        $Item1 = [
            'name' => 'Item',
            'attr' => ['PartNumber' => "872-AA"],
            'children' => [
                'ProductName'=>'Lawnmower',
                'Quantity'=>'1',
                'USPrice'=>'148.95',
                'Comment'=>'Confirm this is electric',
                ],
        ];

        $Item2 = [
            'name' => 'Item',
            'attr' => ['PartNumber' => "926-AA"],
            'children' => [
                'ProductName'=>'Baby Monitor',
                'Quantity'=>'2',
                'USPrice'=>'39.98',
                'ShipDate'=>'1999-05-21',
            ],
        ];

        $Items = [
            'name' => 'Items',
            'childrenMix' => [
                [name =>'','value' => self::createElement($dom, $Item1)],
                [name =>'','value' => self::createElement($dom, $Item2)],
            ],
        ];
        $domItems = self::createElement($dom, $Items);

        $domShipping = self::createElement($dom, $Shipping);
        $domBilling = self::createElement($dom, $Billing);
        //$domItems = self::createElement($dom, $domItems);


        $element = [
            'name' => 'PurchaseOrderNumber',
            'attr' => ['PurchaseOrderNumber' => '99503', 'OrderDate'  => '1999-10-20'],
            'childrenMix' => [
                [name =>'','value' => $domShipping],
                [name =>'','value' => $domBilling],
                [name =>'DeliveryNotes','value' => 'Please leave packages in shed by driveway.'],
                [name =>'','value' => $domItems],


            ],
        ];

        $dom->appendChild(self::createElement($dom, $element));
        $dom->formatOutput = true;
        $dom->save($path);
    }

    public static function createElement($dom, $data)
    {
        //$dom = new DOMDocument('1.0', 'UTF-8');
        $element = $dom->createElement($data['name']);
        if (!empty($data['attr'])) {
            foreach ($data['attr'] as $key => $value) {
                $attr = $dom->createAttribute($key);
                $attr->value = $value;
                $element->appendChild($attr);
            }
        }

        if (!empty($data['children'])) {
            foreach ($data['children'] as $key => $value) {
                $child = $dom->createElement($key, $value);
                $element->appendChild($child);
            }
        }

        if (!empty($data['childrenMix'])) {
            foreach ($data['childrenMix'] as $value) {
                if ($value['name'] != '') {
                    $child = $dom->createElement($value['name'], $value['value']);
                    $element->appendChild($child);
                } else {
                    $element->appendChild($value['value']);
                }
            }
        }

        return $element;
    }
}