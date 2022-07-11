### 美团外卖开放平台PHP SDK

1. 美团外卖开放平台PHP SDK，支持`零售综合`、`医疗综合`以及`团好货`三大板块。
2. 新增ISV安全认证 -- 服务商获取 access_token （单元测试对应：TokenTest.php）

### 安装

```shell script
composer require shishaoqi/meituan-takeaway
```

### 使用
```php
use Shishaoqi\MeituanFlashPurchase\Application;

......

$config = [
    'app_id' => 'xxx',
    'app_secret' => 'xxx',
    'request_url' => '', // 默认 `https://waimaiopen.meituan.com/api/v1/`
];

$app = new Application($config);

$params = ['order_id' => '27061900338318741', 'is_mt_logistics' => 1];
$orderDetail = $app->order->getOrderDetail($params);

print_r(json_decode($orderDetail, true));

// 商品类、活动类接口支持异步队列
$app->goods->async()->create([]);
......
```

### 单元测试

1. 首先安装依赖 `composer install`。ps: 要使用单元测试，要求 php >= 7.1

2. 执行以下单元测试命令时，请先确认已把 TestCase.php 文件中的 `$config` 配置修改好了 及 TokenTest.php 中相关配置
```shell script
# 执行所有的单元测试
vendor/bin/phpunit

# 指定执行某个单元方法
vendor/bin/phpunit --filter=test_get_token_and_refresh_token
```

