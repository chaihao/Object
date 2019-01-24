<?php 

$fileDir = 'img/';
$fileName = 'rongyao.png';


$sTmpVar = fread(fopen($fileDir.$fileName, 'r'), filesize($fileDir.$fileName));
header("Content-type: image/png");
echo $sTmpVar;


 ?>



