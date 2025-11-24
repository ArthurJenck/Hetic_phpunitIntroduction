<?php

namespace App;

use App\Exception\DecodeInvalidStringException;
use App\Exception\DecodeNullValueException;
use App\Exception\EncodeNullValueException;

class Encoding
{
    public function __construct() {}

    public function encode($a)
    {
        if ($a == null) {
            throw new EncodeNullValueException();
        }

        return base64_encode($a);
    }

    public function decode($a)
    {
        if ($a == null) {
            throw new DecodeNullValueException();
        }

        $result = base64_decode($a, true);

        if ($result == false) {
            throw new DecodeInvalidStringException();
        }

        return $result;
    }
}
