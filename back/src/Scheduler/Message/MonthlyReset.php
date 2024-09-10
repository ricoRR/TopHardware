<?php

namespace App\Scheduler\Message;

class MonthlyReset
{
    public function __construct(private int $id) {}

    public function getId(): int
    {
        // return $this->id;
    }
}