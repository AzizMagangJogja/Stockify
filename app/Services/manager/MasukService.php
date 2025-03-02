<?php

namespace App\Services\Manager;

use App\Repositories\Manager\MasukRepository;
use App\Repositories\UserActivityRepository;
use Illuminate\Support\Facades\Validator;

class MasukService {
    protected $masukRepository;
    protected $userActivityRepository;

    public function __construct(
        MasukRepository $masukRepository,
        UserActivityRepository $userActivityRepository,
    ) {
        $this->masukRepository = $masukRepository;
        $this->userActivityRepository = $userActivityRepository;
    }

    public function getPaginatedMasuk($perPage = 20) {
        return $this->masukRepository->paginateMasuk($perPage);
    }

    public function storeMasuk(array $data) {
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
        $data['type'] = 'Masuk';
        $data['status'] = 'Pending';
    
        $masuk = $this->masukRepository->createMasuk($data);
        $product = $masuk->product;
        $this->userActivityRepository->createActivity([
            'user_id' => auth()->id(),
            'action' => 'Membuat',
            'activity' => 'Transaksi baru dari produk: ' . $product->name
        ]);
    
        return $masuk;
    }

    public function updateMasuk($id, array $data) {
        $masuk = $this->masukRepository->findMasukById($id);
        $validator = Validator::make($data, [
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|date',
            'notes' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            throw new \Exception(implode(', ', $validator->errors()->all()));
        }

        $oldMasuk = clone $masuk;

        $this->masukRepository->updateMasuk($masuk, $data);
        $product = $masuk->product;

        $changes = [];
        if ($oldMasuk->quantity != $data['quantity']) {
            $changes[] = 'kuantitas dari "' . $oldMasuk->quantity . '" ke "' . $data['quantity'] . '"';
        }
        if ($oldMasuk->date != $data['date']) {
            $changes[] = 'tanggal dari "' . $oldMasuk->date . '" ke "' . $data['date'] . '"';
        }
        if ($oldMasuk->notes != $data['notes']) {
            $oldNotes = $oldMasuk->notes ?: 'kosong';
            $newNotes = $data['notes'] ?: 'kosong';
            $changes[] = 'catatan dari "' . $oldNotes . '" ke "' . $newNotes . '"';
        }

        $activityDetails = $changes ? implode(', ', $changes) : 'tidak ada perubahan';
        $this->userActivityRepository->createActivity([
            'user_id' => auth()->id(),
            'action' => 'Mengupdate',
            'activity' => 'Transaksi produk: ' . $product->name . ' (' . $activityDetails . ')'
        ]);

        return $masuk;
    }

    public function deleteMasuk($id) {
        $masuk = $this->masukRepository->findMasukById($id);
        $this->masukRepository->deleteMasuk($masuk);
        $product = $masuk->product;

        $this->userActivityRepository->createActivity([
            'user_id' => auth()->id(),
            'action' => 'Menghapus',
            'activity' => 'Produk: ' . $product->name
        ]);

        return $masuk;
    }

    public function findMasukById($id) {
        return $this->masukRepository->findMasukById($id);
    }

    public function searchMasuk(string $keyword, $perPage = 20) {
        return $this->masukRepository->searchMasuk($keyword, $perPage);
    }
}