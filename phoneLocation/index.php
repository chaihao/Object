<?php 


	require_once '../config.php';

	require_once('./PhoneService.php');
 /**
     * @api {get} v1/leads/phone 手机号归属地
     * @apiVersion 1.0.0
     * @apiName leads/phone
     * @apiGroup leadsGroup
     * @apiDescription 获取省市区
     *
     * @apiParam {Number} mobile 手机号
     *
     * @author chaihao <chaihao0823@gmail.com>
     */
 	$model = new PhoneService();
 	$mobile = $_GET['mobile'];
 	$data = $model->phone($mobile);

 	print_r($data);
 ?>