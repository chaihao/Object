<?php 


class Text{


	public function index($field= 'the',$fliePath = 'english.txt'){
		$file = fopen($fliePath,'r');
		$data = '';
		while(!feof($file)){
			$data .= fgets($file).'<br>';
		}

		// 读取本本内容至末尾
		// $data = fread($file,filesize("english.txt"));

		fclose($file);

		$num = substr_count($data,$field);

		return $num;

	}


}	






 ?>