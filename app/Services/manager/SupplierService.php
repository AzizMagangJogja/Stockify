<?php

namespace App\Services\Manager;

use App\Repositories\Manager\SupplierRepository;

class SupplierService {
    protected $supplierRepository;

    public function __construct(SupplierRepository $supplierRepository) {
        $this->supplierRepository = $supplierRepository;
    }

    public function getPaginatedSupplier($perPage = 20) {
        return $this->supplierRepository->paginateSupplier($perPage);
    }

    public function searchSupplier(string $keyword, $perPage = 20) {
        return $this->supplierRepository->searchSupplier($keyword, $perPage);
    }
}