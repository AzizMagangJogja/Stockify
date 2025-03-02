<?php

namespace App\Services\Staff;

use App\Models\Products;
use App\Repositories\Staff\PenerimaanRepository;
use App\Repositories\UserActivityRepository;
use Illuminate\Support\Facades\Validator;

class PenerimaanService {
    protected $penerimaanRepository;
    protected $userActivityRepository;

    public function __construct(
        PenerimaanRepository $penerimaanRepository,
        UserActivityRepository $userActivityRepository,
    ) {
        $this->penerimaanRepository = $penerimaanRepository;
        $this->userActivityRepository = $userActivityRepository;
    }

    public function getPaginatedPenerimaan($perPage = 20) {
        return $this->penerimaanRepository->paginatePenerimaan($perPage);
    }

    public function updatePenerimaan($id, array $data) {
        $masuk = $this->penerimaanRepository->findPenerimaanById($id);

        $validator = Validator::make($data, [
            'status' => 'required|in:Diterima,Ditolak',
            'notes' => 'nullable|string|max:255'
        ]);

        if ($validator->fails()) {
            throw new \Exception(implode(', ', $validator->errors()->all()));
        }

        $product = Products::find($masuk->product_id);
        if (!$product) {
            throw new \Exception('Produk tidak ditemukan');
        }

        if ($data['status'] === 'Diterima') {
            $product->quantity += $masuk->quantity;
            $product->save();
        }
        
        $oldMasuk = clone $masuk;
        $this->penerimaanRepository->updatePenerimaan($masuk, $data);

        $changes = [];
        if ($oldMasuk->status != $data['status']) {
            $changes[] = 'status dari "' . $oldMasuk->status . '" ke "' . $data['status'] . '"';
        }
        if ($oldMasuk->notes != $data['notes']) {
            $changes[] = 'catatan dari "' . $oldMasuk->notes . '" ke "' . $data['notes'] . '"';
        }

        $activityDetails = $changes ? implode(', ', $changes) : 'tidak ada perubahan';
        $this->userActivityRepository->createActivity([
            'user_id' => auth()->id(),
            'action' => 'Konfirmasi',
            'activity' => 'Konfirmasi produk: ' . $product->name . ' (' . $activityDetails . ')'
        ]);

        return $masuk;
    }

    public function searchPenerimaan(string $keyword, $perPage = 20) {
        return $this->penerimaanRepository->searchPenerimaan($keyword, $perPage);
    }
}