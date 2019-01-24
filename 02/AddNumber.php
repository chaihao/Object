<?php 



require_once('../Model.php');
require_once('../01/Number.php');


class AddNumber
{
	
	 public function index()
	{
		$numberModel = new Number();
		$data = $numberModel->getRant(10);
		$model = new Model('number');
		$result = [];
		$num = 0;
		foreach ($data as $key => $value) {
			$result = [
				'number' => $value
			];
			// 添加数据
			$info = $model->insert($result);
			// 获取添加数据ID
			if ($info > 0 ) {
				$num += 1;
			}
		}
		return $num;
	}
	
}







 ?>