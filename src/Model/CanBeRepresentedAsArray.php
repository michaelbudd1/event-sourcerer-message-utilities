<?php

declare(strict_types=1);

namespace PearTreeWebLtd\EventSourcererMessageUtilities\Model;

interface CanBeRepresentedAsArray
{
    public function toArray(): array;
}
