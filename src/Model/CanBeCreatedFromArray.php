<?php

declare(strict_types=1);

namespace PearTreeWebLtd\EventSourcererMessageUtilities\Model;

interface CanBeCreatedFromArray
{
    public static function fromArray(array $array);
}
