<?php

namespace App\Services\Admin;

use App\Repositories\Admin\OpnameRepository;

class OpnameService {
    protected $opnameRepository;

    public function __construct(OpnameRepository $opnameRepository) {
        $this->opnameRepository = $opnameRepository;
    }

    public function getPaginatedOpname($perPage = 20) {
        return $this->opnameRepository->paginateOpname($perPage);
    }
}