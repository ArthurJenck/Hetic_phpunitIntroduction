<?php

namespace App;

use App\Exception\DecodeInvalidStringException;
use App\Exception\DecodeNullValueException;
use App\Exception\EncodeNullValueException;

class Encoding
{
    private const HASH_SECRET_KEY = '312e5afa57ae2d99447cfb3984443b5359041f6dbafb87ba716ff35143c97556';

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

    public function hash($a)
    {
        if ($a == null) {
            throw new EncodeNullValueException();
        }

        return hash_hmac('sha256', $a, self::HASH_SECRET_KEY);
    }
}
