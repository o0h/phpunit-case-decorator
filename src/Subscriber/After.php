<?php

declare(strict_types=1);

namespace O0h\PhpunitCaseDecorator\Subscriber;

use O0h\PhpunitCaseDecorator\HookMethodBag;
use PHPUnit\Event\Test\Finished as FinishedEvents;
use PHPUnit\Event\Test\FinishedSubscriber;

class After implements FinishedSubscriber
{
    public function notify(FinishedEvents $event): void
    {
        $testCase = $event->test()->name();
        $method = HookMethodBag::instance()->after($testCase);
        if (!$method) {
            return;
        }

        call_user_func([$event->test()->className(), $method]);
    }
}
