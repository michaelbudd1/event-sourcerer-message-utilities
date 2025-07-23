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
    public static function forNewEvent(string $eventJson): Message
    {
        return Message::fromString(
            sprintf(
                MessagePattern::NewEvent->value,
                $eventJson,
            ) . MessageMarkup::NewEventParser->value
        );
    }

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
            ) . MessageMarkup::NewEventParser->value
        );
    }

    public static function forProvidingIdentity(ApplicationId $applicationId): Message
    {
        return Message::fromString(
            sprintf(
                MessagePattern::ProvideIdentity->value,
                $applicationId
            ). MessageMarkup::NewEventParser->value
        );
    }

    public static function forAcknowledgement(
        StreamId $streamId,
        ApplicationId $applicationId,
        Checkpoint $checkpoint,
        Checkpoint $allStreamCheckpoint
    ): Message {
        return Message::fromString(
            sprintf(
                MessagePattern::Acknowledgement->value,
                $streamId,
                $applicationId,
                $checkpoint->toInt(),
                $allStreamCheckpoint->toInt()
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
                self::parseOriginalEvent($originalMessage)
            ) . MessageMarkup::NewEventParser->value
        );
    }

    private static function parseOriginalEvent(string $originalMessage): string
    {
        return sprintf(
            '%s %s %s',
            MessageMarkup::RejectedEventStart->value,
            $originalMessage,
            MessageMarkup::RejectedEventEnd->value
        );
    }
}
