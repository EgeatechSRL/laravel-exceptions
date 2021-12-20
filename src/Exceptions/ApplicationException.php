<?php

namespace EgeaTech\LaravelExceptions\Exceptions;

use EgeaTech\LaravelExceptions\Interfaces\Exceptions\LogicErrorException;
use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use Throwable;

abstract class ApplicationException extends Exception implements LogicErrorException, Responsable
{
    private ?string $messageKey = null;

    protected string $exceptionTranslationsFolder = 'exceptions/';

    /**
     * @param  null|string  $message The error message to be displayed or a key to the appropriate translation file
     * @param  int  $httpStatusCode The HTTP code to be attached to the response, defaults to 400
     * @param  Throwable|null  $previous Optional, the previous exception of the chain
     * @param  array  $messageArguments Optional parameters to be injected into the string to be translated
     */
    public function __construct(
        ?string $message = "",
        int $httpStatusCode = Response::HTTP_BAD_REQUEST,
        Throwable $previous = null,
        array $messageArguments = []
    ) {
        $exceptionTranslationKey = $this->getFullExceptionTranslationKey($message);

        if (Lang::has($exceptionTranslationKey)) {
            $this->messageKey = $exceptionTranslationKey;
            $message = Lang::get($exceptionTranslationKey, $messageArguments, Lang::getLocale());
        }

        parent::__construct($message, $httpStatusCode, $previous);
    }

    /**
     * Defines the proper way to present the error to
     * the user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function render(Request $request): Response
    {
        return new Response(
            $this->getMessage(),
            $this->getCode(),
            $this->getResponseHeaders()
        );
    }

    /**
     * Converts the exception to an object that can be
     * returned to the user.
     *
     * @param  Request $request
     * @return Response
     */
    public function toResponse($request): Response
    {
        return $this->render($request);
    }

    /**
     * Translation key for the message to be rendered
     * for this exception.
     * The field is null if no translation is found for
     * given key.
     *
     * @return null|string
     */
    public function getMessageKey(): ?string
    {
        return $this->messageKey;
    }

    /**
     * @param  string  $translationKey
     * @return string
     */
    private function getFullExceptionTranslationKey(string $translationKey): string
    {
        return (string) Str::of($this->getExceptionTranslationFileName())
            ->afterLast('\\')
            ->snake()
            ->prepend($this->exceptionTranslationsFolder)
            ->append('.')
            ->append($translationKey);
    }

    protected function getExceptionTranslationFileName(): string
    {
        return get_class($this);
    }

    protected function getResponseHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
        ];
    }
}
