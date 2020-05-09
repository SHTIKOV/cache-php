<?php declare (strict_types = 1);

namespace Shtikov;

use Shtikov\Redis\Execute\Executor;
use Shtikov\Redis\Config;
use Shtikov\Redis\Tools\Misc as MiscTools;

final class Redis
{
    use MiscTools;

    /** @var Executor */
    private $executor;

    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->executor = new Executor($this->config);
    }

    public function has(string $key): bool
    {
        $output = $this->executor->execute('exists', $key);
        return $this->toBool($output);
    }

    public function set(string $key, string $value): void
    {
        $this->executor->execute('set', $key, $value);
    }

    public function get(string $key, ?callable $transform = null): ?string
    {
        if (!$this->has($key)) {
            return null;
        }

        $output = $this->executor->execute('get', $key);
        return !\is_null($transform) ? $transform($output) : $output;
    }

    public function delete(string $key): void
    {
        $this->executor->execute('del', $key);
    }

    public function getInt(string $key): ?int
    {
        return $this->get($key, $this->toInt);
    }

    public function getFloat(string $key): ?float
    {
        return $this->get($key, $this->toFloat);
    }

    public function getArray(string $key): ?array
    {
        return $this->get($key, $this->toArray);
    }
}