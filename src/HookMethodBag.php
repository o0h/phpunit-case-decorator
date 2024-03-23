<?php

declare(strict_types=1);

namespace O0h\PhpunitCaseDecorator;

class HookMethodBag
{
    private static ?self $instance = null;
    private array $hookMethods = [];

    public static function instance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function add($testCase, $methods): void
    {
        $this->hookMethods[$testCase] = $methods;
    }

    public function clear()
    {
        $this->hookMethods = [];
    }

    public function before($testCase): ?string
    {
        return $this->hookMethods[$testCase]['before'] ?? null;
    }

    public function after($testCase): ?string
    {
        return $this->hookMethods[$testCase]['after'] ?? null;
    }
}
