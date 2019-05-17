<?php 

/**
 * 
 */
class Number
{
	
	/**
	 * [getRant description]
	 * @param  string $count [生成随机数条数]
	 * @param  string $min   [description]
	 * @param  string $max   [description]
	 * @return [type]        [description]
	 */
	public function getRant($count= '100',$min='10000000',$max='99999999')
	{

		$num = 0;
		$number = [];
		while ($num < $count) {
			$number[] = mt_rand($min,$max);
			// 去除重复数据
			$number = array_flip(array_flip($number));
			$num = count($number);
		}
		shuffle($number);
		return $number;
	}

}


 ?>