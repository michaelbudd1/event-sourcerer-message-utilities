<?php

declare(strict_types=1);

namespace PearTreeWebLtd\EventSourcererMessageUtilities\Exception;

use PearTreeWebLtd\EventSourcererMessageUtilities\Model\MessageType;

final class CouldNotCreateMessageType extends \RuntimeException
{
    public static function becauseTypeIsUnknown(string $type): self
    {
        return new self(
            sprintf(
                'Could not create message type because type "%s" is unknown. Known types are: %s',
                $type,
                implode(', ', MessageType::values())
            )
        );
    }
}
