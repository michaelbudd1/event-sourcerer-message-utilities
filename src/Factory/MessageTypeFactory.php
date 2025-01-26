<?php

declare(strict_types=1);

namespace PearTreeWebLtd\EventSourcererMessageUtilities\Factory;

use PearTreeWebLtd\EventSourcererMessageUtilities\Exception\CouldNotCreateMessageType;
use PearTreeWebLtd\EventSourcererMessageUtilities\Model\MessageType;

final class MessageTypeFactory
{
    public static function fromMessage(string $data): MessageType
    {
        $messageParts = explode(' ', $data);

        $type = MessageType::tryFrom($messageParts[0]);

        if (null === $type) {
            throw CouldNotCreateMessageType::becauseTypeIsUnknown($messageParts[0]);
        }

        return $type;
    }
}
