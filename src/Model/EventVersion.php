<?php

declare(strict_types=1);

namespace PearTreeWebLtd\EventSourcererMessageUtilities\Model;

final class EventVersion implements IsInteger
{
    public const int DEFAULT = 1;

    use FulfilIsInteger;
}


