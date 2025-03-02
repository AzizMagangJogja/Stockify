<?php

namespace App\Repositories\Admin;

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

    public function updateSupplier($supplier, array $data) {
        return $supplier->update($data);
    }

    public function deleteSupplier($supplier) {
        return $supplier->delete();
    }

    public function searchSupplier(string $keyword, $perPage = 20) {
        return Supplier::where('name', 'LIKE', "%{$keyword}%")
            ->paginate($perPage);
    }
}