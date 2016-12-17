<?php
// #####################################Info######################################
// FileName->TestControl.php
// Description->
//
// Ver->1.0
// Author->LiuMingchuan
// CreateDate->2016年12月17日
//
// Copyright (c) 2016,Company
// All rights reserved.
// #####################################Info######################################
class TestControl
{

    function userReg ()
    {
        $url = "http://mcf.co.jp/user/reg";
        $testData = array(
                "nick_name" => "Ryoma",
                "sex" => 1,
                "password" => "lmc624",
                "icon" => "@/Users/LiuMingchuan/Ryoma/WorkSpace/PHP/MCF/APP/mcf/2.png"
        );
        
        _sendPSOTRequest($url, $testData);
    }
}
?>