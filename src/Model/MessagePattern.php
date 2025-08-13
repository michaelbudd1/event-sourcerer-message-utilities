<?php

declare(strict_types=1);

namespace PearTreeWebLtd\EventSourcererMessageUtilities\Model;

enum MessagePattern: string
{
    case Catchup         = MessageType::CatchupRequest->value . ' %s %s %s';
    case Acknowledgement = MessageType::Acknowledgement->value . ' %s %s %d %d';
    case NewEvent        = MessageType::NewEvent->value . ' %s';
    case ProvideIdentity = MessageType::ProvideIdentity->value . ' %s';
    case RejectEvent     = MessageType::RejectEvent->value . ' %s %s %s %s';
}
