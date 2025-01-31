<?php

namespace App\Repositories\Manager;

use App\Models\Supplier;

class SupplierRepository {
    public function paginateSupplier($perPage = 20) {
        return Supplier::paginate($perPage);
    }

    public function createSupplier(array $data) {
        return Supplier::create($data);
    }

    public function findSupplierById($id) {
        return Supplier::findOrFail($id);
    }

    public function searchSupplier(string $keyword, $perPage = 20) {
        return Supplier::where('name', 'LIKE', "%{$keyword}%")
            ->paginate($perPage);
    }
}