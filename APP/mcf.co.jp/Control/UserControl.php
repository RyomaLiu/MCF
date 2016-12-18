<?php
// #####################################Info######################################
// FileName->UserControl.php
// Description->
//
// Ver->1.0
// Author->LiuMingchuan
// CreateDate->2016年12月14日
//
// Copyright (c) 2016,Company
// All rights reserved.
// #####################################Info######################################
require_once (APP . "/Model/UserModel.php");

class UserControl
{

    /**
     * 用户注册
     */
    function userReg ()
    {
        _safeFilter($_POST);
        $bindParams = array(
                $_POST["nick_name"],
                $_POST["password"],
                UPOLAD_ICON_PRE_URL . "/" . $iconName
        );
        
        array_unshift($bindParams, "sss");
        $userModel = new UserModel();
        $result = $userModel->userReg($bindParams);
        if ($result == 1) {
            _echoSuccess(201, "注册成功");
        } else {
            _echoFail(501, "注册失败");
        }
        $userModel = null;
    }

    function userLogin ()
    {
        _safeFilter($_POST);
        $bindParams = array(
                $_POST["nick_name"],
                $_POST["password"]
        );
        array_unshift($bindParams, "ss");
        $userModel = new UserModel();
        $result = $userModel->userLogin($bindParams);
        if (count($result) > 0) {
            _echoSuccess(201, "登录成功",$result);
        } else {
            _echoFail(501, "登录失败");
        }
        $userModel = null;
    }

    /**
     * 获取所有用户
     */
    function userGet ()
    {
        _safeFilter($_POST);
        $userModel = new UserModel();
        $result = $userModel->userGet();
        _echoSuccess(201, "获取用户成功", $result);
    }
}
?>