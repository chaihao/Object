<?php 


/**
 *
 * 
 */
require_once('../config.php');
require_once(PI_APP_PATH.'/01/Number.php');
class RedisModel 
{
	private $redis = null;

	function __construct($local= '127.0.0.1'){
		$this->redis = new Redis();
		$this->redis->connect($local,6379);
	}
	
	public function set(){
		
		// 获取随机数
		$numberModel = new Number();
		$data = $numberModel->getRant(10);

		for ($i=0; $i <count($data) ; $i++) { 
			 $this->redis->lpush("number", $data[$i]);
		}

		return ture;

	}

	public function get($name,$start,$end){
		
		// 获取随机数
		$data = $this->redis->lrange($name,$start,$end);
		 // 获取所有key
		// $data = $this->redis->keys($name);

		return $data;

	}

}

 ?>