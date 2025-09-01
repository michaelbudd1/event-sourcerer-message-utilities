<?php

declare(strict_types=1);

namespace PearTreeWebLtd\EventSourcererMessageUtilities\Model;

final readonly class Event
{
    public function __construct(
        public Checkpoint $allSequenceCheckpoint,
        public Checkpoint $catchupStreamCheckpoint,
        public EventVersion $eventVersion,
        public EventName $eventName,
        public array $payload,
        public StreamId $streamId,
        public \DateTimeImmutable $eventOccurredAt,
        public StreamId $catchupRequestStreamId
    ) {}
}
