<?php

namespace App\Services;

use App\Repositories\PdfLinkRepository;

class PdfLinkService extends BaseService
{
    public function __construct(PdfLinkRepository $pdfLinkRepository)
    {
        $this->repository = $pdfLinkRepository;
    }

    public function saveData(array $data)
    {
        return $this->repository->saveLink($data);
    }
}
