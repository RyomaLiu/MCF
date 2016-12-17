<?php
// #####################################Info######################################
// FileName->MCFDBManager.php
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
 * 获取数据库连接
 *
 * @param 索引值 $key            
 * @return 数据库连接
 */
function _connectDB ()
{
    $dbInfo = $GLOBALS["db"][DB_KEY];
    if (! $dbInfo) {
        _errorEcho("没有可用的数据库连接信息");
    }
    // 超全局变量中不存在则创建数据库连接
    if (! isset($GLOBALS[DB_MD5KEY])) {
        $dbLink = mysqli_connect($GLOBALS["db"][DB_KEY]["host"], 
                $GLOBALS["db"][DB_KEY]["user"], $GLOBALS["db"][DB_KEY]["password"], 
                $GLOBALS["db"][DB_KEY]["database"]);
        if (! $dbLink) {
            _errorEcho("数据库连接失败");
        }
        mysqli_set_charset($dbLink, "utf8");
        // 存储到超全局变量
        $GLOBALS[DB_MD5KEY] = $dbLink;
    }
    return $GLOBALS[DB_MD5KEY];
}

/**
 * 执行SQL语句
 *
 * @param 数据库连接 $dbLink            
 * @param SQL语句 $sql            
 * @param SQL语句绑定参数 $bindParams
 *            array("参数类型","绑定参数"...)
 * @return 执行结果
 */
function _runSql ($dbLink, $sql, $bindParams = null)
{
    // SQL语句预处理
    if ($stmt = mysqli_prepare($dbLink, $sql)) {
        // 有限定参数
        if ($bindParams) {
            $bindParamsMethod = new ReflectionMethod("mysqli_stmt", "bind_param");
            $bindParamsReferences = array();
            // 限定参数类型
            $typeDefinitionString = array_shift($bindParams);
            foreach ($bindParams as $key => $value) {
                $bindParamsReferences[$key] = &$bindParams[$key];
            }
            array_unshift($bindParamsReferences, $typeDefinitionString);
            $bindParamsMethod->invokeArgs($stmt, $bindParamsReferences);
        }
        if (mysqli_stmt_execute($stmt)) {
            $resultMetaData = mysqli_stmt_result_metadata($stmt);
            if ($resultMetaData) {
                $stmtRow = array();
                $rowReferences = array();
                while ($field = mysqli_fetch_field($resultMetaData)) {
                    $rowReferences[] = &$stmtRow[$field->name];
                }
                mysqli_free_result($resultMetaData);
                $bindResultMethod = new ReflectionMethod("mysqli_stmt", 
                        "bind_result");
                $bindResultMethod->invokeArgs($stmt, $rowReferences);
                $result = array();
                while (mysqli_stmt_fetch($stmt)) {
                    foreach ($stmtRow as $key => $value) {
                        $row[$key] = $value;
                    }
                    $result[] = $row;
                }
                mysqli_stmt_free_result($stmt);
            } else {
                $result = mysqli_stmt_affected_rows($stmt);
            }
            mysqli_stmt_close($stmt);
        } else {
            $result = FALSE;
        }
    } else {
        $result = FALSE;
    }
    return $result;
}

/**
 * 关闭数据库连接
 *
 * @param unknown $key            
 */
function _closeDB ()
{
    if (isset($GLOBALS[DB_MD5KEY])) {
        mysqli_close($GLOBALS[$md5Key]);
    }
}
?>