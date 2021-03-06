<?php declare (strict_types = 1);

namespace Shtikov\CachePHP\Execute;

use Shtikov\CachePHP\Config;

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
        $this->config->getUrl();
        return 'bar';
    }
}