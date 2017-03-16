<?php

$tpl = '<p>The variable \'{var}\' has value {val}. </p>"';
$res = ['var' => 'Name','val' => 15];
echo "<pre>";
print_r($res);
foreach ($res as $key => $value) {
    $tpl = mb_ereg_replace('\{\s*' . $key .'\s*\}', $value, $tpl);
}
echo $tpl;
