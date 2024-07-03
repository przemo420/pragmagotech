<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Service;

use InvalidArgumentException;
use PragmaGoTech\Interview\Enum\FeeTerm;
use PragmaGoTech\Interview\Interface\FeeTermInterface;
use PragmaGoTech\Interview\Model\Term\FeeTerm12;
use PragmaGoTech\Interview\Model\Term\FeeTerm24;

class FeeCalculatorResolver
{
    /**
     * @throws InvalidArgumentException
     */
    public function resolve(FeeTerm $term): FeeTermInterface
    {
        return match ($term) {
            FeeTerm::Term12 => new FeeTerm12,
            FeeTerm::Term24 => new FeeTerm24,
            default         => throw new InvalidArgumentException("Term ($term->name) unrecognized"),
        };
    }
}
