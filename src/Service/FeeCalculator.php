<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Service;

use InvalidArgumentException;
use PragmaGoTech\Interview\Interface\FeeCalculatorInterface;
use PragmaGoTech\Interview\Model\LoanProposal;

class FeeCalculator implements FeeCalculatorInterface
{
    private FeeCalculatorValidator $validator;
    private FeeCalculatorResolver  $resolver;

    public function __construct()
    {
        $this->validator = new FeeCalculatorValidator;
        $this->resolver  = new FeeCalculatorResolver;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function calculate(LoanProposal $application): float
    {
        $this->validator->validate($application);

        $amount = $application->getAmount();
        $term   = $application->getTerm();

        $termResolved = $this->resolver->resolve($term);
        $fees         = $termResolved->getFees();

        if (isset($fees[$amount])) {
            return $fees[$amount];
        }

        $feeBound = $this->findFeeBound($amount, $fees);
        $feeTerm  = $fees[$feeBound];
        $fee      = $feeTerm / $feeBound * $amount;

        return ceil($fee / 5) * 5;
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
