<?php

require_once __DIR__.'/../vendor/autoload.php';

/** @var \Hanson\Meituan\Meituan $meituan */
$meituan = new \Hanson\Meituan\Meituan([
    'developer_id' => '',
    'sign_key' => '',
    'debug' => true,
    'log' => [
        'name' => 'meituan',
        'file' => __DIR__.'/meituan.log',
        'level'      => 'debug',
        'permission' => 0777,
    ]
]);
