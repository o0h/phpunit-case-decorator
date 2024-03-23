<?php

declare(strict_types=1);

namespace O0h\PhpunitCaseDecorator;

use O0h\PhpunitCaseDecorator\Subscriber\After;
use O0h\PhpunitCaseDecorator\Subscriber\Before;
use O0h\PhpunitCaseDecorator\Subscriber\SuiteStarted;
use PHPUnit\Runner\Extension\Facade;
use PHPUnit\Runner\Extension\ParameterCollection;
use PHPUnit\TextUI\Configuration\Configuration;

class Extension implements \PHPUnit\Runner\Extension\Extension
{
    public function bootstrap(Configuration $configuration, Facade $facade, ParameterCollection $parameters): void
    {
        $facade->registerSubscribers(
            new SuiteStarted(),
            new Before(),
            new After(),
        );
    }
}
