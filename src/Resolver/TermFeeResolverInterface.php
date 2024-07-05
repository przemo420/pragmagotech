<?php

namespace PragmaGoTech\Interview\Resolver;

use PragmaGoTech\Interview\Enum\FeeTerm;
use PragmaGoTech\Interview\Model\Term\FeeTermInterface;

interface TermFeeResolverInterface
{
    public function resolve(FeeTerm $term): FeeTermInterface;
}
