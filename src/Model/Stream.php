<?php

declare(strict_types=1);

namespace PearTreeWebLtd\EventSourcererMessageUtilities\Model;

final readonly class Stream
{
    /**
     * @param array{eventName: string, properties: array<string, mixed>} $events
     */
    public function __construct(
        public StreamId $id,
        public StreamName $name,
        public array $events,
        public int $nextVersion,
    ) {}
}
