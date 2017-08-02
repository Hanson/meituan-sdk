# meituan-sdk
美团 SDK

## 安装

`composer require hanson/meituan-sdk:dev-master`

## 文档 (慢慢补充中）

目前处于自用状态，需要了解可加QQ群 ：  570769430

```
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

// 根据 auth token 创建实例
$meituan = $meituan->createAuthorizer('token');
```
