<?php

declare(strict_types=1);

namespace PearTreeWebLtd\EventSourcererMessageUtilities\Model;

final readonly class StreamId implements IsString
{
    use FulfilIsString;

    private const string ALL_STREAM = '*';

    public function isAllStream(): bool
    {
        return self::ALL_STREAM === $this->value;
    }
}
