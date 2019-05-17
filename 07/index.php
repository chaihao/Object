<?php 

require_once('CaculateFiles.php');
require_once('../config.php');


$obj = new CaculateFiles();

$obj->setShowFlag(false);
$obj->setFileSkip(array('i'));
// $obj->setLineSkip(array());

$obj->run(PI_APP_PATH);
echo "<hr/>";
$obj->run('/Users/chaihao/object/07');
