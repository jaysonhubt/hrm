<?php

namespace App\Repositories;

use App\Models\Schedule;

class ScheduleRepository extends BaseRepository
{
    public function __construct(Schedule $schedule)
    {
        $this->model = $schedule;
    }
}
