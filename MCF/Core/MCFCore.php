<?php
// #####################################Info######################################
// FileName->MCFCore.php
// Description->
//
// Ver->1.0
// Author->LiuMingchuan
// CreateDate->2016年12月14日
//
// Copyright (c) 2016,Company
// All rights reserved.
// #####################################Info######################################
/**
 * 执行任务
 */
function _doAction ()
{
    $actions = require_once (APP . "/Conf/AppAction.php");
    $actionKey = $_SERVER["PATH_INFO"];
    $actionCtrl = $actions[$actionKey]["C"];
    $action = $actions[$actionKey]["M"];
    $actionCtrlName = $actionCtrl . "Control";
    $controlFilePath = APP . "/Control/" . $actionCtrlName . ".php";
    if (isset($actions[$actionKey]) && is_array($actions[$actionKey])) {
        if (file_exists($controlFilePath)) {
            require_once ($controlFilePath);
            if (class_exists($actionCtrlName)) {
                $ctrl = new $actionCtrlName();
                if (method_exists($ctrl, $action)) {
                    $ctrl->$action();
                } else {
                    _echoFail(500, "请求任务不存在");
                }
            } else {
                _echoFail(500, "请求类不存在");
            }
        } else {
            _echoFail(500, "请求文件不存在");
        }
    } else {
        _echoFail(500, "请求路径错误");
    }
}

/**
 * 发送POST请求
 * @param unknown $uri            
 * @param unknown $postData            
 */
function _sendPSOTRequest ($url, $postData)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $return = curl_exec($ch);
    if ($return === false) {
        _echoWeb(curl_errno($ch));
    }
    curl_close($ch);
    echo $return;
}

/**
 * php防注入和XSS攻击过滤
 * @param unknown $arr
 */
function _safeFilter (&$arr)
{
    $ra = Array(
            '/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/',
            '/script/',
            '/javascript/',
            '/vbscript/',
            '/expression/',
            '/applet/',
            '/meta/',
            '/xml/',
            '/blink/',
            '/link/',
            '/style/',
            '/embed/',
            '/object/',
            '/frame/',
            '/layer/',
            '/title/',
            '/bgsound/',
            '/base/',
            '/onload/',
            '/onunload/',
            '/onchange/',
            '/onsubmit/',
            '/onreset/',
            '/onselect/',
            '/onblur/',
            '/onfocus/',
            '/onabort/',
            '/onkeydown/',
            '/onkeypress/',
            '/onkeyup/',
            '/onclick/',
            '/ondblclick/',
            '/onmousedown/',
            '/onmousemove/',
            '/onmouseout/',
            '/onmouseover/',
            '/onmouseup/',
            '/onunload/'
            );

    if (is_array($arr)) {
        foreach ($arr as $key => $value) {
            if (! is_array($value)) {
                if (! get_magic_quotes_gpc()) // 不对magic_quotes_gpc转义过的字符使用addslashes(),避免双重转义。
                {
                    $value = addslashes($value); // 给单引号（'）、双引号（"）、反斜线（\）与
                    // NUL（NULL 字符）加上反斜线转义
                }
//                 $value = preg_replace($ra, '', $value); // 删除非打印字符，粗暴式过滤xss可疑字符串
                $arr[$key] = htmlentities(strip_tags($value)); // 去除 HTML 和 PHP 标记并转换为HTML 实体
            } else {
                SafeFilter($arr[$key]);
            }
        }
    }
}
?>