<?php declare (strict_types = 1);

use Shtikov\Redis;
use Shtikov\Redis\Config;
use PHPUnit\Framework\TestCase;

class RedisTest extends TestCase
{
    /**
     * @depends ConfigTest::testFromArray
     * @dataProvider ConfigTest::getConfigProvider
     */
    public function testSetGet(Config $config): void
    {
        $redis = new Redis($config);
        $redis->set('foo', 'bar');

        $result = $redis->get('foo');
        $this->assertSame($result, null);
    }

    /**
     * @depends testSetGet
     * @dataProvider ConfigTest::getConfigProvider
     */
    public function testDelete(Config $config): void
    {
        $redis = new Redis($config);
        $this->assertSame($redis->get('foo'), null);

        $redis->delete('foo');

        $this->assertSame($redis->get('foo'), null);
    }
}