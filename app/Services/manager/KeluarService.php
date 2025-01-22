<?php

namespace App\Services\Manager;

use App\Repositories\Manager\KeluarRepository;
use App\Repositories\Manager\UserActivityRepository;
use Illuminate\Support\Facades\Validator;

class KeluarService {
    protected $keluarRepository;
    protected $userActivityRepository;

    public function __construct(
        KeluarRepository $keluarRepository,
        UserActivityRepository $userActivityRepository,
    ) {
        $this->keluarRepository = $keluarRepository;
        $this->userActivityRepository = $userActivityRepository;
    }

    public function getPaginatedKeluar($perPage = 20) {
        return $this->keluarRepository->paginateKeluar($perPage);
    }

    public function storeKeluar(array $data) {
        $validator = Validator::make($data, [
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|date',
            'notes' => 'nullable|string'
        ]);
    
        if ($validator->fails()) {
            throw new \Exception(implode(', ', $validator->errors()->all()));
        }
    
        $data['user_id'] = auth()->id();
        $data['type'] = 'Keluar';
        $data['status'] = 'Pending';
    
        $keluar = $this->keluarRepository->createKeluar($data);
        $product = $keluar->product;
        $this->userActivityRepository->createActivity([
            'user_id' => auth()->id(),
            'action' => 'Membuat',
            'activity' => 'Transaksi baru dari produk: ' . $product->name
        ]);
    
        return $keluar;
    }

    public function updateKeluar($id, array $data) {
        $keluar = $this->keluarRepository->findKeluarById($id);
        $validator = Validator::make($data, [
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|date',
            'notes' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            throw new \Exception(implode(', ', $validator->errors()->all()));
        }

        $oldKeluar = clone $keluar;

        $this->keluarRepository->updateKeluar($keluar, $data);
        $product = $keluar->product;

        $changes = [];
        if ($oldKeluar->quantity != $data['quantity']) {
            $changes[] = 'kuantitas dari "' . $oldKeluar->quantity . '" ke "' . $data['quantity'] . '"';
        }
        if ($oldKeluar->date != $data['date']) {
            $changes[] = 'tanggal dari "' . $oldKeluar->date . '" ke "' . $data['date'] . '"';
        }
        if ($oldKeluar->notes != $data['notes']) {
            $oldNotes = $oldKeluar->notes ?: 'kosong';
            $newNotes = $data['notes'] ?: 'kosong';
            $changes[] = 'catatan dari "' . $oldNotes . '" ke "' . $newNotes . '"';
        }

        $activityDetails = $changes ? implode(', ', $changes) : 'tidak ada perubahan';
        $this->userActivityRepository->createActivity([
            'user_id' => auth()->id(),
            'action' => 'Mengupdate',
            'activity' => 'Transaksi produk: ' . $product->name . ' (' . $activityDetails . ')'
        ]);

        return $keluar;
    }

    public function deleteKeluar($id) {
        $keluar = $this->keluarRepository->findKeluarById($id);
        $this->keluarRepository->deleteKeluar($keluar);
        $product = $keluar->product;

        $this->userActivityRepository->createActivity([
            'user_id' => auth()->id(),
            'action' => 'Menghapus',
            'activity' => 'Produk: ' . $product->name
        ]);
        return $keluar;
    }

    public function findKeluarById($id) {
        return $this->keluarRepository->findKeluarById($id);
    }
}