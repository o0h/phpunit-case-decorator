<?php

declare(strict_types=1);

namespace ExampleApp\Test\Unit;

use ExampleApp\StringUtil;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(StringUtil::class)]
class StringUtilTest extends TestCase
{
    public function testRevers()
    {
        $this->assertSame('cba', StringUtil::reverse('abc'));
    }
}
