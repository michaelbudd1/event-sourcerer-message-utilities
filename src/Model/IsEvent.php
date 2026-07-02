<?php

declare(strict_types=1);

namespace PearTreeWebLtd\EventSourcererMessageUtilities\Model;

interface IsEvent extends CanBeCreatedFromArray, CanBeRepresentedAsArray
{
    public static function name(): string;

    public static function version(): EventVersion;

    public function toArray(): array;
}
