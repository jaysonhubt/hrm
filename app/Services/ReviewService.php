<?php

namespace App\Services;

use App\Repositories\ReviewRepository;

class ReviewService extends BaseService
{
    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->repository = $reviewRepository;
    }
}
