<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\CalculatorStrategy;

use InvalidArgumentException;

class TermCalculatorStrategy implements CalculatorStrategyInterface
{
    public function calculate(float $amount, array $fees): float
    {
        if (isset($fees[$amount])) {
            return $fees[$amount];
        }

        $feeBound = $this->findFeeBound($amount, $fees);
        $feeTerm  = $fees[$feeBound];

        return $feeTerm / $feeBound * $amount;
    }

    private function findFeeBound(float $amount, array $fees): int
    {
        $feeKeys = array_keys($fees);
        for ($i = 0; $i < $feeKeys; $i++) {
            if ($amount > $feeKeys[$i + 1]) {
                continue;
            }

            return $feeKeys[$i];
        }

        throw new InvalidArgumentException("Can not find a fee for amount $amount");
    }
}
