# meituan-sdk
美团 SDK

## 安装

`composer require hanson/meituan-sdk:dev-master`

## 文档

### 实例化

```php

$meituan = new Meituan([
    'developer_id' => '',
    'sign_key' => '',
    'debug' => true, // 输出日志
    'log' => [
        'name' => 'meituan',
        'file' => storage_path('logs/meituan.log'),
        'level'      => 'debug',
        'permission' => 0777,
    ]
]);
```

### 获取授权链接

```
// 获取授权链接
$url = $meituan->store->getAuthorizeUrl([
    'businessId' => 2, // 2 为外卖
    'ePoiId' => 'your-ePoiId',
    'callbackUrl' => 'http://example.com/callback',
]);
```

### 获取授权门店

```
$response = $meituan->store->callback();

if (empty($response)) {
    return false;
}

$authToken = $response['appAuthToken'];

// 获取门店信息
$info = $meituan->createAuthorizer($authToken)->waimai->poi->queryPoiInfo($response['ePoiId']);
```

### 解绑门店链接

```
return $meituan->store->getUnbindUrl(2);
```

### 获取门店的实例

```
$meituan = $meituan->createAuthorizer('token');
```

### 其他实例

```
// 获取门店实例
$meituan = $meituan->createAuthorizer('token');

// 订单实例
$order = $meituan->order;

// 菜品实例
$dish = $meituan->dish;

// 门店实例
$poi = $meituan->poi;

// 团购券实例
$coupon = $meituan->coupon;

```

### 具体API

具体API可参考美团文档，只需要传业务级别的参数即可

![QQ图片20170922125319.png](https://i.loli.net/2017/09/22/59c497680b28c.png)

如此 API 即为

```
$order->queryById('order-id');
```

