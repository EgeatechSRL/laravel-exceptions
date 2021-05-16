<?php

namespace EgeaTech\LaravelExceptions\Exceptions;

use Exception;
use Throwable;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Lang;
use EgeaTech\LaravelExceptions\Interfaces\Exceptions\LogicErrorException;

abstract class ApplicationException extends Exception implements LogicErrorException
{
    private ?string $messageKey = null;

    public function __construct($message = "", $code = Response::HTTP_BAD_REQUEST, Throwable $previous = null)
    {
        $messageKey = (string) Str::of(get_class($this))
            ->afterLast('\\')
            ->snake()
            ->prepend('exceptions/')
            ->append('.')
            ->append($message);

        if (Lang::has($messageKey)) {
            $this->messageKey = $messageKey;
            $message = trans($messageKey, [], 'en');
        }

        parent::__construct($message, $code, $previous);
    }

    public function getMessageKey(): ?string
    {
        return $this->messageKey;
    }
}
