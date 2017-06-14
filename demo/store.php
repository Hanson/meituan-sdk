<?php

require_once __DIR__.'/config.php';

$meituan->store->toMap([
    'businessId' => 2,
    'ePoiId' => 1,
    'ePoiName' => '包菜测试店铺1',
    'callbackUrl' => 'http://meituan.tunnel.2bdata.com/callback.php',
]);