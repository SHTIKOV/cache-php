<?php declare (strict_types = 1);

namespace Shtikov\Redis\Execute;

interface ExecutorInterface
{
    public function execute(string $methodName, string $key, $value = null): ?string;
}