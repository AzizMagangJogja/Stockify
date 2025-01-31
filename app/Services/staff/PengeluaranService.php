<?php

namespace App\Services\Staff;

use App\Models\Products;
use App\Repositories\Staff\PengeluaranRepository;
use App\Repositories\Staff\UserActivityRepository;
use Illuminate\Support\Facades\Validator;

class PengeluaranService {
    protected $pengeluaranRepository;
    protected $userActivityRepository;

    public function __construct(
        PengeluaranRepository $pengeluaranRepository,
        UserActivityRepository $userActivityRepository,
    ) {
        $this->pengeluaranRepository = $pengeluaranRepository;
        $this->userActivityRepository = $userActivityRepository;
    }

    public function getPaginatedPengeluaran($perPage = 20) {
        return $this->pengeluaranRepository->paginatePengeluaran($perPage);
    }

    public function updatePengeluaran($id, array $data) {
        $keluar = $this->pengeluaranRepository->findPengeluaranById($id);

        $validator = Validator::make($data, [
            'status' => 'required|in:Diterima,Ditolak,Dikeluarkan',
            'notes' => 'nullable|string|max:255'
        ]);

        if ($validator->fails()) {
            throw new \Exception(implode(', ', $validator->errors()->all()));
        }

        if ($data['status'] === 'Dikeluarkan') {
            $product = Products::find($keluar->product_id);

            if ($product->quantity >= $keluar->quantity) {
                $product->quantity -= $keluar->quantity;
                $product->save();
            } else {
                throw new \Exception('Stok tidak mencukupi!');
            }
        }

        $oldKeluar = clone $keluar;
        $this->pengeluaranRepository->updatePengeluaran($keluar, $data);

        $changes = [];
        if ($oldKeluar->status != $data['status']) {
            $changes[] = 'status dari "' . $oldKeluar->status . '" ke "' . $data['status'] . '"';
        }
        if ($oldKeluar->notes != $data['notes']) {
            $changes[] = 'catatan dari "' . $oldKeluar->notes . '" ke "' . $data['notes'] . '"';
        }

        $activityDetails = $changes ? implode(', ', $changes) : 'tidak ada perubahan';
        $this->userActivityRepository->createActivity([
            'user_id' => auth()->id(),
            'action' => 'Konfirmasi',
            'activity' => 'Konfirmasi produk: ' . $product->name . ' (' . $activityDetails . ')'
        ]);

        return $keluar;
    }

    public function searchPengeluaran(string $keyword, $perPage = 20) {
        return $this->pengeluaranRepository->searchPengeluaran($keyword, $perPage);
    }
}