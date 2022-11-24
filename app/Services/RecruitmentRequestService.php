<?php

namespace App\Services;

use App\Repositories\RecruitmentRequestRepository;

class RecruitmentRequestService extends BaseService
{
    public function __construct(RecruitmentRequestRepository $recruitmentRequestRepository)
    {
        $this->repository = $recruitmentRequestRepository;
    }
}
