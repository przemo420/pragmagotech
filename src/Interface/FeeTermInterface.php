<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Interface;

interface FeeTermInterface
{
    public function getTerm(): int;
    public function getFees(): array;
}
