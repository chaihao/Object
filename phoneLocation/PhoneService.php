<?php
/**
 * Created by PhpStorm.
 * User: chaihao
 * Date: 2019-02-19
 * Time: 14:28
 */
require_once(PI_APP_PATH.'/phoneLocation/src/PhoneLocation.php');

class PhoneService
{
    /**
     * 手机号码归属地查询
     * @param $mobile
     * @return array
     */
    public static function phone($mobile)
    {
        $model = new PhoneLocation();
        $data = [];
        $info = function ($phone, $tel) {
            if (!empty($tel)) {
                if ($tel['province'] == $tel['city']) {
                    $tel['location'] = $tel['city'];
                } else {
                    $tel['location'] = $tel['province'] . ' ' . $tel['city'];
                }
            }
            $tel['mobile'] = $phone;
            return $tel;
        };
        if (is_array($mobile)) {
            for ($i = 0; $i < count($mobile); $i++) {
                if (isset($mobile[$i]) && self::isLegalMobile($mobile[$i])) {
                    $tel = $model->find($mobile[$i]);
                    $data[] = $info($mobile[$i], $tel);
                    unset($tel);
                }
            }
        } else {
            if (self::isLegalMobile($mobile)) {
                $tel = $model->find($mobile);
                $data[] = $info($mobile, $tel);
            }
        }
        return $data;
    }

    /***
     * @param $phone 手机号
     * @return false|int
     */
    public static function isLegalMobile($phone)
    {
//        return preg_match('/^[1][3-9]\d{9}$|^([5|6|9])\d{7}$|^[0][9]\d{8}$|^[6]([8|6])\d{5}$/', $phone);
        return preg_match('/^[1][3-9]\d{9}$/', $phone);
    }



}