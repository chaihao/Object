<?php 



/**
 * 
 */
class StatWord 
{
	
	public function index($filename = '../04/english.txt'){

		$file = fopen($filename, 'r');
		if ($file === false) {
			// 文件打开失败
			exit;
		}

		$word = "";
		$results = [];
		while (false !== ($letter = fgetc($file))) {
			 if ($letter == ' ' ) {
			     if (isset($results[$word])) {
			     	$results[$word] += 1;
			     }else{
			     	$results[$word] = 1;
			     }
			     $word = "";
			 } else {
			 	if (!in_array($letter , ['.',',',')','(','&','$','<','>','/','?','!','"',"'"])) {
			 		$word .= $letter;
			 	}
			 }

		}
		fclose($file);
		print_r($results);
	}
}




 ?>