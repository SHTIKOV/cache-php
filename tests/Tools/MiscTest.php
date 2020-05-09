<?php declare (strict_types = 1);

use Shtikov\Redis\Tools\Misc;
use PHPUnit\Framework\TestCase;

class MiscTest extends TestCase
{
    /**
     * @dataProvider getBoolProvider
     */
    public function testToBool(string $arg1, string $arg2, int $arg3, int $arg4, $arg5 = null): void
    {
        $this->assertSame(Misc::toBool($arg1), true);
        $this->assertSame(Misc::toBool($arg2), false);
        $this->assertSame(Misc::toBool($arg3), true);
        $this->assertSame(Misc::toBool($arg4), false);
        $this->assertSame(Misc::toBool($arg5), false);
    }

    public function getBoolProvider(): array
    {
        return [
            [
                'true',
                'false',
                1,
                0,
                null,
            ]
        ];
    }
}