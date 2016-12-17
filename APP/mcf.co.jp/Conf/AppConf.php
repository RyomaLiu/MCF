<?php
// #####################################Info######################################
// FileName->AppConf.php
// Description->
//
// Ver->1.0
// Author->LiuMingchuan
// CreateDate->2016年12月14日
//
// Copyright (c) 2016,Company
// All rights reserved.
// #####################################Info######################################
// 应用名称
define("APP_NAME", "mcf.co.jp");
define("APP_URL", "http://mcf.co.jp");

// 时区设置
date_default_timezone_set("Asia/Shanghai");
// 错误报告
error_reporting(0);
// 语言设置
header("Content-Type:text/html;charset=UTF-8");

// 日志文件出力路径
define("LOG", APP . "/Log/mcf.co.jp.log");
// 上传头像路径
define("UPLOAD_ICON", APP . "/Upload/Icon");
define("UPOLAD_ICON_PRE_URL", APP_URL . "/Upload/Icon");

// 数据库KEY
define("DB_KEY", "tsc");
define("DB_MD5KEY", 
        $md5Key = md5(
                $GLOBALS["db"][DB_KEY]["host"] . "--" .
                         $GLOBALS["db"][DB_KEY]["user"] . "--" .
                         $GLOBALS["db"][DB_KEY]["password"] . "--" .
                         $GLOBALS["db"][DB_KEY]["database"]));

?>