<?php

namespace App\Services;

use App\Repositories\ScheduleRepository;

class ScheduleService extends BaseService
{
    public function __construct(ScheduleRepository $scheduleRepository)
    {
        $this->repository = $scheduleRepository;
    }
}
