<?php

namespace EgeaTech\LaravelExceptions\Interfaces\Exceptions;

use Throwable;

interface LogicErrorException extends Throwable
{
    public function getMessageKey(): ?string;
}
