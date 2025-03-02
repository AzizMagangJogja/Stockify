<?php

namespace App\Services\Admin;

use App\Repositories\Admin\SupplierRepository;
use App\Repositories\UserActivityRepository;
use Illuminate\Support\Facades\Validator;

class SupplierService {
    protected $supplierRepository;
    protected $userActivityRepository;

    public function __construct(
        SupplierRepository $supplierRepository,
        UserActivityRepository $userActivityRepository,
    ) {
        $this->supplierRepository = $supplierRepository;
        $this->userActivityRepository = $userActivityRepository;
    }

    public function getPaginatedSupplier($perPage = 20) {
        return $this->supplierRepository->paginateSupplier($perPage);
    }

    public function storeSupplier(array $data) {
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255|unique:suppliers,email'
        ]);

        if ($validator->fails()) {
            throw new \Exception(implode(', ', $validator->errors()->all()));
        }

        $supplier = $this->supplierRepository->createSupplier($data);

        $this->userActivityRepository->createActivity([
            'user_id' => auth()->id(),
            'action' => 'Menambah',
            'activity' => 'Supplier baru: ' . $supplier->name
        ]);

        return $supplier;
    }

    public function updateSupplier($id, array $data) {
        $supplier = $this->supplierRepository->findSupplierById($id);

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255|unique:suppliers,email,' . $id,
        ]);

        if ($validator->fails()) {
            throw new \Exception(implode(', ', $validator->errors()->all()));
        }

        $oldSupplier = clone $supplier;
        $this->supplierRepository->updateSupplier($supplier, $data);

        $changes = [];
        if ($oldSupplier->name != $data['name']) {
            $changes[] = 'nama dari "' . $oldSupplier->name . '" ke "' . $data['name'] . '"';
        }
        if ($oldSupplier->address != $data['address']) {
            $changes[] = 'alamat dari "' . $oldSupplier->address . '" ke "' . $data['address'] . '"';
        }
        if ($oldSupplier->phone != $data['phone']) {
            $changes[] = 'no. telpon dari "' . $oldSupplier->phone . '" ke "' . $data['phone'] . '"';
        }
        if ($oldSupplier->email != $data['email']) {
            $changes[] = 'email dari "' . $oldSupplier->email . '" ke "' . $data['email'] . '"';
        }

        $activityDetails = $changes ? implode(', ', $changes) : 'tidak ada perubahan';
        $this->userActivityRepository->createActivity([
            'user_id' => auth()->id(),
            'action' => 'Mengupdate',
            'activity' => 'Supplier: ' . $supplier->name . ' (' . $activityDetails . ')'
        ]);

        return $supplier;
    }

    public function deleteSupplier($id) {
        $supplier = $this->supplierRepository->findSupplierById($id);
        $this->supplierRepository->deleteSupplier($supplier);

        $this->userActivityRepository->createActivity([
            'user_id' => auth()->id(),
            'action' => 'Menghapus',
            'activity' => 'Supplier: ' . $supplier->name
        ]);

        return $supplier;
    }

    public function searchSupplier(string $keyword, $perPage = 20) {
        return $this->supplierRepository->searchSupplier($keyword, $perPage);
    }
}
