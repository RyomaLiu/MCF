<?php
// #####################################Info######################################
// FileName->MCF.php
// Description->
//
// Ver->1.0
// Author->LiuMingchuan
// CreateDate->2016年12月14日
//
// Copyright (c) 2016,Company
// All rights reserved.
// #####################################Info######################################
define("ROOT", dirname(dirname(__FILE__)));
define("MCF", dirname(__FILE__));
// 框架配置
require_once (MCF . "/Conf/MCFConf.php");
// 框架核心
require_once (MCF . "/Core/MCFCore.php");
// 框架相应信息
require_once (MCF . "/Core/MCFResponse.php");
// 框架日志
require_once (MCF . "/Core/MCFLog.php");
// 框架数据库
require_once (MCF . "/DB/MCFDBManager.php");
//
require_once (MCF . "/Core/MCFUpload.php");
?>