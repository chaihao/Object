<?php 



require_once('AddNumber.php');



$model = new AddNumber();


 $num = $model->index();


 echo "成功添加".$num."数据";

 ?>