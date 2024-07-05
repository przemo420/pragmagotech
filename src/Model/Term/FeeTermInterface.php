<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Model\Term;

interface FeeTermInterface
{
    public function getTerm(): int;
    public function getFees(): array;
}
