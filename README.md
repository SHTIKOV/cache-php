# cache-php

Simple client for working with cache service.

## How to install
To install, run the following [composer](https://getcomposer.org/)  command:
```
composer require shtikov/redis-php
```

## Usage

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use Shtikov\CachePHP;
use Shtikov\CachePHP\Config;

$configData = [
  'host' => 'localhost',
  'port' => 6379,
  'lifetime' => 5000,
];
$config = Config::fromArray($configData);
$redis = new CachePHP($config);
$redis->set('foo', 'bar');

$result = $redis->get('foo');
\var_dump($result); // string(bar)
```
