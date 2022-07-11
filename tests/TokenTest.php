<?php


namespace Shishaoqi\MeituanFlashPurchase\Tests;


use Shishaoqi\MeituanFlashPurchase\Application;

class TokenTest extends TestCase
{
    public function test_get_token_and_refresh_token()
    {
        $appId = '119094'; // 测试前，修改为你的 appId
        $appPoiCode = '119094_2705266';  // 三方门店ID -- 测试前，请修改为对应三方的 appPoiCode

        // 应用配置 -- 测试前，请修改
        $config = [
            'app_id' => '119094',
            'app_secret' => 'xxxxx',
        ];
        $application = new Application($config);

        $rsCode = $application->token->getAuthorizeCode($appId, $appPoiCode);
        echo "\n rsCode: " . $rsCode;
        $rsCode = json_decode($rsCode, true);
        $code = $rsCode['code'];
        echo "\n code:" . $code;

        $code = 'code_mL0LUkFoU9R0OZ0xQg1PyA';
        $rsToken = $application->token->getAccessToken($appId, $code);
        echo "\n rsToken=: " . $rsToken;
        $rsToken = json_decode($rsToken, true);
        $accessToken = $rsToken['access_token'];
        $refresh_token = $rsToken['refresh_token'];
        echo "\n acccessToken: " . $accessToken;
        echo "\n refresh_token: " . $refresh_token;

        $rsRefresh = $application->token->refreshToken($appId, $refresh_token);
        echo "\n refreshToken: " . json_encode($rsRefresh);
    }
}