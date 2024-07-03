<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Service;

use InvalidArgumentException;
use PragmaGoTech\Interview\Model\LoanProposal;

class FeeCalculatorValidator
{
    /**
     * @throws InvalidArgumentException
     */
    public function validate(LoanProposal $application): void
    {
        $amount = $application->getAmount();

        if ($amount < 1000 || $amount > 20000) {
            throw new InvalidArgumentException('Load amount must be between 1,000 and 20,000.');
        }

        if (round($amount, 2) != $amount) {
            throw new InvalidArgumentException('Loan amount can have at most two decimal places.');
        }
    }
}
