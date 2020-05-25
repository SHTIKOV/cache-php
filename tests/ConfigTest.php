<?php declare (strict_types = 1);

use PHPUnit\Framework\TestCase;
use Shtikov\CachePHP\Config;

class ConfigTest extends TestCase
{
    /**
     * @dataProvider getConfigDataProvider
     */
    public function testFromArray(array $configData): void
    {
        $config = Config::fromArray($configData);
        $this->assertSame(Config::class, get_class($config), 'Config is not instance of class "Config"');
        $this->assertSame('localhost', $config->getHost(), 'Config host is not "localhost"');
        $this->assertSame(6379, $config->getPort(), 'Config port is not 6379');
        $this->assertSame(1000, $config->getLifetime(), 'Config lifetime is not 1000');
    }

    /**
     * @depends testFromArray
     * @dataProvider getConfigProvider
     */
    public function testGetUrl(Config $config): void
    {
        $this->assertSame($config->getUrl(), 'localhost:6379');
    }

    public function getConfigDataProvider(): array
    {
        return [
            [
                [
                    'host' => 'localhost',
                    'port' => 6379,
                    'lifetime' => 1000,
                ]
            ]
        ];
    }

    public function getConfigProvider(): array
    {
        $configData = [
            'host' => 'localhost',
            'port' => 6379,
            'lifetime' => 1000,
        ];
        return [
            [
                Config::fromArray($configData)
            ]
        ];
    }
}