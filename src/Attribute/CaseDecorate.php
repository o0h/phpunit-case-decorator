<?php

declare(strict_types=1);

namespace O0h\PhpunitCaseDecorator\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class CaseDecorate
{
    public function __construct(
        public readonly ?string $before = null,
        public readonly ?string $after = null,
    ) {}
}
