<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Model\Term;

use PragmaGoTech\Interview\Interface\FeeTermInterface;

class FeeTerm24 implements FeeTermInterface
{
    public function getTerm(): int
    {
        return 24;
    }

    public function getFees(): array
    {
        return [
            1000  => 70,
            2000  => 100,
            3000  => 120,
            4000  => 160,
            5000  => 200,
            6000  => 240,
            7000  => 280,
            8000  => 320,
            9000  => 360,
            10000 => 400,
            11000 => 440,
            12000 => 480,
            13000 => 520,
            14000 => 560,
            15000 => 600,
            16000 => 640,
            17000 => 680,
            18000 => 720,
            19000 => 760,
            20000 => 800,
        ];
    }
}
