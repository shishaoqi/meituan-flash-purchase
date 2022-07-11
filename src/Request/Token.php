<?php


namespace Abbotton\MeituanTakeaway\Request;

/**
 * Class Token
 * @package Abbotton\MeituanTakeaway\Request
 * 美团文档：https://open-shangou.meituan.com/home/guide/market/10686
 */
class Token extends BaseRequest
{
    /**
     * 获取商家授权码code
     * @param $app_id
     * @param $app_poi_code
     * @param $response_type
     * @return mixed
     */
    public function getAuthorizeCode($app_id, $app_poi_code)
    {
        $params = [
            'app_id' => $app_id,
            'app_poi_code' => $app_poi_code,
            'response_type' => 'code'
        ];
        return $this->get('oauth/authorize', $params);
    }

    /**
     * 通过授权码code获取access_token --  标准方式获取 access_token
     * @param $app_id
     * @param $grant_type
     * @param string $code 通过/oauth/authorize 接口获取的授权码
     * @return mixed
     */
    public function getAccessToken($app_id, $code)
    {
        $params = [
            'app_id' => $app_id,
            'grant_type' => 'authorization_code',
            'code' => $code
        ];
        return $this->post('oauth/token', $params);
    }

    /**
     * 快捷方式获取 access_token
     * @param $app_id
     * @param $app_poi_code
     * @return mixed
     */
    public function quickGetAccessToken($app_id, $app_poi_code)
    {
        $params = [
            'app_id' => $app_id,
            'app_poi_code' => $app_poi_code,
            'response_type' => 'token'
        ];
        return $this->get('oauth/token', $params);
    }

    /**
     * 通过refresh_token刷新access_token -- 刷新 access_token
     * @param $app_id
     * @param $refresh_token
     * @return mixed
     */
    public function refreshToken($app_id, $refresh_token)
    {
        $params = [
            'app_id' => $app_id,
            'grant_type' => 'refresh_token',
            'refresh_token' => $refresh_token
        ];
        return $this->post('oauth/token', $params);
    }
}