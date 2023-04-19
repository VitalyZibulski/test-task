<?php
declare(strict_types=1);

namespace App\Contracts\Payments;

interface ParserInterface
{
    public function parse(string $file): \Generator;
}
