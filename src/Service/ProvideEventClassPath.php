<?php

namespace PearTreeWebLtd\EventSourcererMessageUtilities\Service;

use PearTreeWebLtd\EventSourcererMessageUtilities\Model\EventName;

interface ProvideEventClassPath
{
    public function for(EventName $eventName): string;
}
