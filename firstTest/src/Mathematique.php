<?php

namespace App;

use App\Exception\DivisionByZeroException;

class Mathematique
{
    public function __construct() {}

    public function addition($a, $b)
    {
        return $a + $b;
    }

    public function soustraction($a, $b)
    {
        return $a - $b;
    }

    public function multiplication($a, $b)
    {
        return $a * $b;
    }

    public function division($a, $b)
    {
        if ($b == 0) {
            throw new DivisionByZeroException();
        }
        return $a / $b;
    }
}
