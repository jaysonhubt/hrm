<?php

namespace App\Repositories;

use App\Models\PdfLink;

class PdfLinkRepository extends BaseRepository
{
    public function __construct(PdfLink $pdfLink)
    {
        $this->model = $pdfLink;
    }

    public function getLink($link)
    {

    }

    public function saveLink(array $data)
    {
        return $this->model->create($data);
    }
}
