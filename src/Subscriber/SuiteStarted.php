<?php

declare(strict_types=1);

namespace O0h\PhpunitCaseDecorator\Subscriber;

use O0h\PhpunitCaseDecorator\Attribute\CaseDecorate;
use O0h\PhpunitCaseDecorator\HookMethodBag;
use PHPUnit\Event\Code\TestCollection;
use PHPUnit\Event\TestSuite\Started;
use PHPUnit\Event\TestSuite\StartedSubscriber;
use ReflectionMethod;

class SuiteStarted implements StartedSubscriber
{
    public function __construct()
    {
        $args = func_get_args();
    }

    public function notify(Started $event): void
    {
        if ($event->testSuite()->isForTestClass()) {
            return;
        }
        $suite = $event->testSuite();
        $this->registerDecorator($suite->tests());
    }

    private function registerDecorator(TestCollection $tests)
    {
        $bag = HookMethodBag::instance();
        $bag->clear();
        foreach ($tests as $test) {
            $testMethod = new ReflectionMethod($test->className(), $test->name());
            $attributes = $testMethod->getAttributes(CaseDecorate::class);
            if (!$attributes) {
                continue;
            }
            foreach ($attributes as $attribute) {
                $decorator = $attribute->newInstance();
                $bag->add($testMethod->name, ['before' => $decorator->before, 'after' => $decorator->after]);
            }
        }
    }
}
