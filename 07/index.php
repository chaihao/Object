<?php 

require_once('CaculateFiles.php');

$obj = new CaculateFiles();

$obj->setShowFlag(false);
// $obj->setLineSkip(array());

$obj->run('/Users/chaihao/Downloads/yingtao/yingtao_V3/yingtao_v3_api/pc/modules/v1');
echo "<hr/>";
$obj->run('/Users/chaihao/object/07');
echo "<hr/>";
$obj->run('/Users/chaihao/object/');
