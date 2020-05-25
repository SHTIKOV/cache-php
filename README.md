# cache-php

Simple client for working with Redis cache service.

## How to install
To install, run the following [composer](https://getcomposer.org/)  command:
```
composer require shtikov/redis-php
```

## Usage

```php
<?php

require __DIR__ . '/vendor/autoload.php';

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
```
