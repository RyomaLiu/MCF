<?php
// #####################################Info######################################
// FileName->MCFUpload.php
// Description->
//
// Ver->1.0
// Author->LiuMingchuan
// CreateDate->2016年12月17日
//
// Copyright (c) 2016,Company
// All rights reserved.
// #####################################Info######################################
function _uploadFile ($file, $savePath)
{
    $fileName = $file["name"];
    $fileNameArray = explode(".", $fileName);
    $fileExtension = $fileNameArray[count($fileNameArray) - 1];
    $newFileName = md5_file($file["tmp_name"]);
    if (move_uploaded_file($file["tmp_name"], 
            $savePath . "/" . $newFileName . "." . $fileExtension)) {
        return $newFileName . "." . $fileExtension;
    } else {
        return "Default.png";
    }
}
?>