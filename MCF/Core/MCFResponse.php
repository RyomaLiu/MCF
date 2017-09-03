<?php
// #####################################Info######################################
// FileName->MCFResponse.php
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
 * 向web页面打印信息
 *
 * @param unknown $info            
 */
function _echoWeb ($info)
{
    echo "<pre>";
    if (is_array($info)) {
        var_dump($info);
    } else {
        echo $info;
    }
    echo "</pre>";
}

/**
 * 反馈成功信息
 *
 * @param unknown $subCode            
 * @param unknown $msg            
 * @param unknown $data            
 */
function _echoSuccess ($subCode = 201, $msg = "Success", $data = "")
{
    echoAll(200, $subCode, $msg, $data);
}

/**
 * 反馈失败信息
 *
 * @param unknown $subCode            
 * @param unknown $msg            
 * @param unknown $data            
 */
function _echoFail ($subCode = 501, $msg = "Fail", $data = "")
{
    echoAll(500, $subCode, $msg, $data);
}

/**
 * 反馈警告信息
 *
 * @param unknown $msg            
 * @param unknown $data            
 */
function _echoWarnning ($msg = "Warnning", $data = "")
{
    echoAll(300, 301, $msg, $data);
}

/**
 * 反馈信息
 *
 * @param unknown $code            
 * @param unknown $subCode            
 * @param unknown $msg            
 * @param unknown $data            
 */
function echoAll ($code, $subCode, $msg, $data)
{
    echo json_encode(
            array(
                    "code" => $code,
                    "subCode" => $subCode,
                    "msg" => $msg,
                    "data" => $data
            ));
}
?>