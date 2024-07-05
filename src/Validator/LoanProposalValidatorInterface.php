<?php

namespace PragmaGoTech\Interview\Validator;

use PragmaGoTech\Interview\Model\LoanProposal;

interface LoadProposalValidatorInterface
{
    public function validate(LoanProposal $application): void;
}
