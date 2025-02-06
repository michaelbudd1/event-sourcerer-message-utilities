<?php

declare(strict_types=1);

namespace PearTreeWebLtd\EventSourcererMessageUtilities\Model;

enum MessageType: string
{
    case Acknowledgement = 'ACKNOWLEDGEMENT';
    case CatchupRequest  = 'CATCHUP';
    case NewEvent        = 'NEW_EVENT';
    case ProvideIdentity = 'IDENTITY';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
