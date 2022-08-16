<?php 


// 项目根目录
define('PI_APP_PATH', realpath(dirname(__FILE__)));
// ini_set('include_path',ini_get('include_path').PATH_SEPARATOR.PI_APP_PATH.'/01');
ini_set('date.timezone', 'Asia/Shanghai');


$config = [

     'mysql'=>[
        'host' => '10.0.3.69',
        'port' => 3306,
        'user' => 'root',
        'password' => 'smghd',
        'db_name' => 'train'
    ],
];

    return $config;


 ?>