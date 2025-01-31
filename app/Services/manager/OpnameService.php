<?php

namespace App\Services\Manager;

use App\Repositories\Manager\OpnameRepository;

class OpnameService {
    protected $opnameRepository;

    public function __construct(OpnameRepository $opnameRepository) {
        $this->opnameRepository = $opnameRepository;
    }

    public function getPaginatedOpname($perPage = 20) {
        return $this->opnameRepository->paginateOpname($perPage);
    }

    public function searchOpname(string $keyword, $perPage = 20) {
        return $this->opnameRepository->searchOpname($keyword, $perPage);
    }
}