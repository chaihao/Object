<?php 

session_start();
if ($_POST['code'] == $_SESSION['number']) {
	echo "成功";
}else{
	echo "失败";
}



 ?>