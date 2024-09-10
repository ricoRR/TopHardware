<?php

namespace App\Scheduler\Handler;

use App\Scheduler\Message\MonthlyReset;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class MonthlyHandler
{
    public function __invoke(MonthlyReset $message)
    {
        // ggg
    }
}