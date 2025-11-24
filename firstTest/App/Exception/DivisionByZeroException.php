<?php

namespace App\Exception;

use LogicException;
use Throwable;

class DivisionByZeroException extends LogicException
{
    public function __construct(string $message = "Division par 0", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
