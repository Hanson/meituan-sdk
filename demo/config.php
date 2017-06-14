<?php

require_once __DIR__.'/../vendor/autoload.php';

/** @var \Hanson\Meituan\Meituan $meituan */
$meituan = new \Hanson\Meituan\Meituan([
    'developer_id' => '100473',
    'sign_key' => '6smu0lf1ll0q6t4u',
    'debug' => true,
    'log' => [
        'name' => 'meituan',
        'file' => __DIR__.'/meituan.log',
        'level'      => 'debug',
        'permission' => 0777,
    ]
]);