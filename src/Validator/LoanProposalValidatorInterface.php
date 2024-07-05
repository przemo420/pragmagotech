<?php

namespace PragmaGoTech\Interview\Validator;

use PragmaGoTech\Interview\Model\LoanProposal;

interface LoanProposalValidatorInterface
{
    public function validate(LoanProposal $application): void;
}
