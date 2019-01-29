<?php 

	require_once('RedisModel.php');

	$redis = new RedisModel();

	$get = $_GET;
	if (isset($get['id']) && $get['id'] == 1) {
		$redis->set();
		echo '添加随机数';
	}else{
	// 获取
		$start = isset($get['start']) ? $get['start'] : 0;
		$end = isset($get['end']) ? $get['end'] : 200;
		$data = $redis->get('number',$start,$end);

		echo '获取随机数:'.implode(',',$data);

	}


 ?>