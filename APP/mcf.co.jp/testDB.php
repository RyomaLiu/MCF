<?php
echo "testDB";
$con = mysqli_connect("127.0.0.1","lmc","lmc624LMC624@","Lmc");
// 检查连接 
if (!$con) 
{ 
    die("连接错误: " . mysqli_connect_error()); 
} 
var_dump($con);
?>