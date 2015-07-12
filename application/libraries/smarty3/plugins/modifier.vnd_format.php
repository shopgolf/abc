<?php
/*
* Smarty plugin
*
-------------------------------------------------------------
* File: modifier.vnd.php
* Type: modifier
* Name: vnd
* Version: 1.0
* Date: April 05th, 2012
* Purpose: Format money to VNĐ
* Install: Drop into the plugin directory.
* Author: nhantam
* Translation to PHP & Smarty: nhantam
*
* Exp:
* {$number|vnd:đ}
* {$number|vnd:vnđ}
-------------------------------------------------------------
*/
function smarty_modifier_vnd_format($number, $symbol = 'đ') {
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1.$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    if (!empty($symbol))
        $number .= $symbol;
    return $number;
}

?>