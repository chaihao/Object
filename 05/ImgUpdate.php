<?php 

/**
 * 
 */
class ImgUpdate
{


	function __construct($path = '../00/img/',$imgName = 'rongyao.png',$endPath = './img/'){
		$sourceFile = $path.$imgName;
		$endFile = $endPath.$imgName;
		$this->img($sourceFile , $endFile);
	}
	
	public function img($sourceFile , $endFile, $thumbWidth = '100', $thumbHeight='100',$quality='100'){

		 $type = substr(strrchr($sourceFile,'.'),1);

		 if ($type == 'gif') {
		 	$img = imagecreatefromgif($sourceFile);
		 }elseif($type == 'jpg'){
		 	$img = imagecreatefromjpeg($sourceFile);
		 }elseif($type == 'png'){
		 	$img = imagecreatefrompng($sourceFile);

		 }

		  echo  '目标图片 尺寸 <hr/>';
		 print_r($thumbWidth);
		 echo "<br/>";
		 print_r($thumbHeight);
		 echo "<hr/>";

		 $width = imagesx($img); 	// 图像宽度
		 $height = imagesy($img);	// 图像高度

		 echo  '原图片 尺寸 <hr/>';
		 print_r($width);
		echo "<br/>";
		 print_r($height);
		 echo "<hr/>";

		if ($width > $height) {
			$newWidth = $thumbWidth;
		 	$divisor = $width / $newWidth;
		 	$newHeight = floor($height / $divisor);

		}else{
			$newHeight = $thumbHeight;
			$divisor = $height / $newHeight;
		 	$newWidth = floor($width / $divisor);

		}
		echo '压缩比例： '. $divisor.'<hr/>';


		 echo  '新图片 尺寸 <hr/>';
		 print_r($newWidth);
		echo "<br/>";
		 print_r($newHeight);
		 echo "<hr/>";

		$tmpimg = imagecreatetruecolor($newWidth, $newHeight);

		imagecopyresampled( $tmpimg, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height );


	 	if ($type == 'gif') {
		 	return  imagegif($tmpimg,$endFile);
		 }elseif($type == 'jpg'){
		 	return imagejpeg($tmpimg,$endFile,$quality);
		 }elseif($type == 'png'){
		 	return imagepng($tmpimg,$endFile);
		 }

	}

}


 ?>