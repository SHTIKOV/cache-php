<?php declare (strict_types = 1);

use Shtikov\CachePHP;
use Shtikov\CachePHP\Config;
use PHPUnit\Framework\TestCase;

class CachePHPTest extends TestCase
{
    /**
     * @depends ConfigTest::testFromArray
     * @dataProvider ConfigTest::getConfigProvider
     */
    public function testSetGet(Config $config): void
    {
        $cachePHP = new CachePHP($config);
        $cachePHP->set('foo', 'bar');

        $result = $cachePHP->get('foo');
        $this->assertSame($result, null);
    }

    /**
     * @depends testSetGet
     * @dataProvider ConfigTest::getConfigProvider
     */
    public function testDelete(Config $config): void
    {
        $cachePHP = new CachePHP($config);
        $this->assertSame($cachePHP->get('foo'), null);

        $cachePHP->delete('foo');

        $this->assertSame($cachePHP->get('foo'), null);
    }
}