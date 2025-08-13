<?php

declare(strict_types=1);

namespace PearTreeWebLtd\EventSourcererMessageUtilities\Model;

enum ApplicationType: string
{
    case Bespoke = 'Bespoke';
    case Laravel = 'Laravel';
    case Symfony = 'Symfony';
    case Unknown = 'Unknown';
}
