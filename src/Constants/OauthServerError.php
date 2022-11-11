<?php

namespace EgeaTech\LaravelExceptions\Constants;

use BenSampo\Enum\Enum;

final class OauthServerError extends Enum
{
    const UnsupportedGrantType = 2;
    const InvalidRequest = 3;
    const InvalidClient = 4;
    const InvalidScope = 5;
    const InvalidCredentials = 6;
    const GenericServerError = 7;
    const InvalidRefreshToken = 8;
    const AccessDenied = 9;
    const InvalidGrantType = 10;
}
