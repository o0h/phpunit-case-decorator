<?php

declare(strict_types=1);

namespace ExampleApp\Test\Unit;

use ExampleApp\ArrayUtil;
use O0h\PhpunitCaseDecorator\Attribute\CaseDecorate;
use PHPUnit\Framework\Attributes\Before;
use PHPUnit\Framework\Attributes\BeforeClass;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ArrayUtil::class)]
final class ArrayUtilTest extends TestCase
{
    #[BeforeClass]
    public static function hoge0()
    {
        $name = __METHOD__;
    }

    #[Before]
    public function hoge()
    {
        $this->name();
    }

    #[CaseDecorate(before: 'beforeNanika')]
    public function testFix()
    {
        $data = ['a', 'b', 'c'];

        $actual = ArrayUtil::fix($data);
        $this->assertSame($data, $actual->toArray());
    }

    #[CaseDecorate(after: 'afterNanika')]
    public function testFix2()
    {
        $data = ['a', 'b', 'c'];

        $actual = ArrayUtil::fix($data);
        $this->assertSame($data, $actual->toArray());
    }

    public static function beforeNanika()
    {
        var_dump(__METHOD__);
    }

    public static function afterNanika()
    {
        var_dump(__METHOD__);
    }

    protected function setUp(): void
    {
        var_dump(__METHOD__);
        parent::setUp();
    }

    protected function tearDown(): void
    {
        var_dump(__METHOD__);
        parent::tearDown();
    }
}
