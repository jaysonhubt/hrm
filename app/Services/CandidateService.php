<?php

namespace App\Services;

use App\Repositories\CandidateRepository;

class CandidateService extends BaseService
{
    public function __construct(CandidateRepository $candidateRepository)
    {
        $this->repository = $candidateRepository;
    }
}
