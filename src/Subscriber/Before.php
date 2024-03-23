<?php

declare(strict_types=1);

namespace O0h\PhpunitCaseDecorator\Subscriber;

use O0h\PhpunitCaseDecorator\HookMethodBag;
use PHPUnit\Event\Test\Finished as FinishedEvents;
use PHPUnit\Event\Test\FinishedSubscriber;
use PHPUnit\Event\Test\Prepared as PreparedEvent;
use PHPUnit\Event\Test\PreparedSubscriber;

class Before implements PreparedSubscriber, FinishedSubscriber
{
    public function notify(PreparedEvent|FinishedEvents $event): void
    {
        $testCase = $event->test()->name();
        $method = HookMethodBag::instance()->before($testCase);
        if (!$method) {
            return;
        }

        call_user_func([$event->test()->className(), $method]);
    }
}
