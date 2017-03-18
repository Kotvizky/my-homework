<?php
/**
 * Created by PhpStorm.
 * User: Johnny
 * Date: 18.03.2017
 * Time: 11:15
 */

namespace DataWork;

class Templates
{
    const TPL = 'tpl';

    public static function parseTpl($tpl, $data)
    {
        $tplText = file_get_contents(TPL . "/$tpl.tpl");
        foreach ($data as $key => $value) {
            $tplText = mb_ereg_replace('\{\s*' . $key . '\s*\}', $value, $tplText);
        }
        return $tplText;
    }


}