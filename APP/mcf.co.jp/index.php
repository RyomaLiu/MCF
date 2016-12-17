<?php
// #####################################Info######################################
// FileName->index.php
// Description->
//
// Ver->1.0
// Author->LiuMingchuan
// CreateDate->2016年12月14日
//
// Copyright (c) 2016,Company
// All rights reserved.
// #####################################Info######################################
define("ROOT", dirname(dirname(dirname(__FILE__))));
define("APP", dirname(__FILE__));
// 导入AppConf
require_once (APP . "/Conf/AppConf.php");
// 导入AppDBConf
require_once (APP . "/Conf/AppDBConf.php");
// 导入Func
require_once (APP . "/Func/Func.php");
// 导入MCF框架
require_once (ROOT . "/MCF/MCF.php"); // 包含数据库、函数库、配置文件

//连接数据库
_connectDB();

// 执行任务
_doAction();

//关闭数据库
_closeDB();

//退出
exit(0);
?>