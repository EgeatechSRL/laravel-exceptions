<?php

namespace EgeaTech\LaravelExceptions\Constants;

use BenSampo\Enum\Enum;

final class PDOError extends Enum
{
    const DbmsUnreachable = 2002;
    const ConnectionKilled = 70100;
    const ServerShuttingDown = '08S01';

    public static function errorCodesNotToBeReported(): array
    {
        return [
            self::DbmsUnreachable,
            self::ConnectionKilled,
            self::ServerShuttingDown,
        ];
    }
}
