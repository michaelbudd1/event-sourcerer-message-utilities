<?php

declare(strict_types=1);

namespace PearTreeWebLtd\EventSourcererMessageUtilities\Service;

use PearTreeWebLtd\EventSourcererMessageUtilities\Model\ApplicationId;
use PearTreeWebLtd\EventSourcererMessageUtilities\Model\Checkpoint;
use PearTreeWebLtd\EventSourcererMessageUtilities\Model\Message;
use PearTreeWebLtd\EventSourcererMessageUtilities\Model\MessageMarkup;
use PearTreeWebLtd\EventSourcererMessageUtilities\Model\MessagePattern;
use PearTreeWebLtd\EventSourcererMessageUtilities\Model\StreamId;

final readonly class CreateMessage
{
    public static function forCatchupRequest(
        StreamId $streamId,
        ApplicationId $applicationId,
        ?Checkpoint $checkpoint = null
    ): Message {
        return Message::fromString(
            sprintf(
                MessagePattern::Catchup->value,
                $streamId,
                $applicationId,
                $checkpoint?->toString() ?? ''
            )
        );
    }

    public static function forProvidingIdentity(ApplicationId $applicationId): Message
    {
        return Message::fromString(
            sprintf(
                MessagePattern::ProvideIdentity->value,
                $applicationId
            )
        );
    }

    public static function forAcknowledgement(
        StreamId $streamId,
        ApplicationId $applicationId,
        Checkpoint $checkpoint
    ): Message {
        return Message::fromString(
            sprintf(
                MessagePattern::Acknowledgement->value,
                $streamId,
                $applicationId,
                $checkpoint->toString()
            ) . MessageMarkup::NewEventParser->value
        );
    }

    public static function forRejection(
        StreamId $streamId,
        ApplicationId $applicationId,
        Checkpoint $checkpoint,
        string $originalMessage
    ): Message {
        return Message::fromString(
            sprintf(
                MessagePattern::RejectEvent->value,
                $streamId,
                $applicationId,
                $checkpoint->toString(),
                $originalMessage
            ) . MessageMarkup::NewEventParser->value
        );
    }
}
