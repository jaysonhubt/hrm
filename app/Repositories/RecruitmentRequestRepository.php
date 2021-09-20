<?php

namespace App\Repositories;

use App\Models\RecruitmentRequest;

class RecruitmentRequestRepository extends BaseRepository
{
    public function __construct(RecruitmentRequest $recruitmentRequest)
    {
        $this->model = $recruitmentRequest;
    }
}
