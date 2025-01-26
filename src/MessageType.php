<?php

declare(strict_types=1);

namespace PearTreeWebLtd\EventSourcererMessageUtilities;

enum MessageType: string
{
    case CatchupRequest  = 'CATCHUP';
    case NewEvent        = 'NEW_EVENT';
    case ProvideIdentity = 'IDENTITY';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
