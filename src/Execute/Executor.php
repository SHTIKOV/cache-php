<?php declare (strict_types = 1);

namespace Shtikov\Redis\Execute;

use Shtikov\Redis\Config;

final class Executor implements ExecutorInterface
{
    /** @var Config */
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function execute(string $methodName, string $key, $value = null): ?string
    {
        return $this->config->getUrl();
    }
}