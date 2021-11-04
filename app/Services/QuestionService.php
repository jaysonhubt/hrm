<?php

namespace App\Services;

use App\Repositories\QuestionRepository;

class QuestionService extends BaseService
{
    public function __construct(QuestionRepository $questionRepository)
    {
        $this->repository = $questionRepository;
    }
}
