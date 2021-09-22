<?php

namespace App\Repositories;

use App\Models\EmailTemplate;

class EmailTemplateRepository extends BaseRepository
{
    public function __construct(EmailTemplate $emailTemplate)
    {
        $this->model = $emailTemplate;
    }
}
