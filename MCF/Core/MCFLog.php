<?php
// #####################################Info######################################
// FileName->MCFLog.php
// Description->
//
// Ver->1.0
// Author->LiuMingchuan
// CreateDate->2016年12月14日
//
// Copyright (c) 2016,Company
// All rights reserved.
// #####################################Info######################################
function _Log ($logInfo)
{
    if (defined("LOG")) {
        file_put_contents(LOG, 
                APP_NAME."--".date("Ymd h:i:s") . ":(N)>>" . arrayToStr($logInfo) . "\n", 
                FILE_APPEND);
    }
}

function _warnningLog ($logInfo)
{
    if (defined("LOG")) {
        file_put_contents(LOG, 
                APP_NAME."----".date("Ymd h:i:s") . ":(W)>>" . arrayToStr($logInfo) . "\n", 
                FILE_APPEND);
    }
}

function _errorLog ($logInfo)
{
    if (defined("LOG")) {
        file_put_contents(LOG, 
                APP_NAME."----".date("Ymd h:i:s") . ":(E)>>" . arrayToStr($logInfo) . "\n", 
                FILE_APPEND);
    }
}

function arrayToStr ($array)
{
    if (is_array($array)) {
        foreach ($array as $key => $val) {
            if (is_array($val)) {
                $string[] = arrayToStr($val);
            } else {
                $string[] = $key . "=" . $val."\n";
            }
        }
    } else {
        $string[] = $array."\n";
    }
    return implode(",", $string);
}
?>