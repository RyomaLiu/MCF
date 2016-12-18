<?php
// #####################################Info######################################
// FileName->UserModel.php
// Description->
//
// Ver->1.0
// Author->LiuMingchuan
// CreateDate->2016年12月14日
//
// Copyright (c) 2016,Company
// All rights reserved.
// #####################################Info######################################
class UserModel
{

    /**
     * 用户注册
     *
     * @param unknown $bindParams            
     * @return 执行结果
     */
    function userReg ($bindParams)
    {
        $db = $GLOBALS[DB_MD5KEY];
        $sql = "insert into user(nick_name,password,icon)values(?,?,?);";
        $result = _runSql($db, $sql, $bindParams);
        return $result;
    }

    /**
     * 用户登录
     *
     * @param unknown $bindParams            
     * @return 执行结果
     */
    function userLogin ($bindParams)
    {
        $db = $GLOBALS[DB_MD5KEY];
        $sql = "select nick_name,icon from user where nick_name = ? and password = ?;";
        $result = _runSql($db, $sql, $bindParams);
        return $result[0];
    }

    /**
     * 获取所有用户
     *
     * @return 执行结果
     */
    function userGet ()
    {
        $db = $GLOBALS[DB_MD5KEY];
        $sql = "select nick_name,icon from user;";
        $result = _runSql($db, $sql);
        return $result;
    }
}
?>