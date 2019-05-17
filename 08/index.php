<?php

require_once '../config.php';


// 有一个一维数组，里面存储整形数据，请写一个函数，将他们按从大到小的顺序排列。要求执行效率高。
function numSort(&$arr)
{
    $cnt = count($arr);
    $flag = 1;
    for ($i = 0; $i < $cnt; $i++) {
        if ($flag == 0) {
            return $arr;
        }
        $flag = 0;
        for ($j = 0; $j < $cnt - $i - 1; $j++) {
        	// echo $j.'--j';;
        	// echo '<br>';
        	// echo $arr[$j].'--2';;
        	// echo "<hr/>";
        	// echo $arr[$j+1].'--3';
        	// echo "<br/>";
            if ($arr[$j] > $arr[$j + 1]) {
                $tmp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $tmp;

                // print_r($arr);
                // echo "<hr/>";
                $flag = 1;
            }
        }

    }

}

$num = array(10,13,1,8, 5, 3, 7, 11, 9);

// print_r($num);
numSort($num);
// echo "<hr/>";
var_dump($num);
exit;

$url = 'http://localhost:8080/crm.php';

echo $urlArr = basename($url) . '<br/>';

echo substr($urlArr, strpos($urlArr, '.'));

echo '<hr/>';

$urlArr = parse_url($url);

print_r($urlArr);
echo '<br/>';

echo basename($urlArr['path']);
echo '<br/>';

$arr = explode('.', $urlArr['path']);

print_r($arr);
echo '<br/>';
echo end($arr);
exit;

$content = file_get_contents(PI_APP_PATH . '/guest.html');

echo $content;
