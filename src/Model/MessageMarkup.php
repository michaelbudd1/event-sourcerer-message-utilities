<?php

declare(strict_types=1);

namespace PearTreeWebLtd\EventSourcererMessageUtilities\Model;

enum MessageMarkup: String
{
    case NewEventParser     = '--- SYSTEM NEW EVENT ---';
    case RejectedEventStart = '--- REJECTED EVENT START ---';
    case RejectedEventEnd   = '--- REJECTED EVENT END ---';
}
