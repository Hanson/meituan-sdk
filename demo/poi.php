<?php

require_once __DIR__.'/config.php';

/** @var \Hanson\Meituan\Meituan $meituan */
$meituan = $meituan->createAuthorizer('7706af169b2c141bd52bb0f7d2e017b8a83e6a3b1951dc26bf3102cba55dbf14');

print_r($meituan->poi->queryPoiInfo(1));