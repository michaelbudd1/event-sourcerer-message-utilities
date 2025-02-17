<?php

declare(strict_types=1);

namespace PearTreeWebLtd\EventSourcererMessageUtilities\Model;

interface IsString
{
    public const string NULL_REPRESENTATION = '';

    public static function fromString(string $value): self;

    public function toString(): string;
}
