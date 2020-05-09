<?php declare (strict_types = 1);

require 'src/autoload.php';

use Shtikov\Redis;
use Shtikov\Redis\Config;

$configData = [
  'host' => 'localhost',
  'port' => 6379,
  'lifetime' => 5000,
];
$config = Config::fromArray($configData);
$redis = new Redis($config);

$redis->set('foo', 'bar');

$result = $redis->get('foo');
\var_dump($result); // string(bar)