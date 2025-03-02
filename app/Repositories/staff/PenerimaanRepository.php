<?php

namespace App\Repositories\Staff;

use App\Models\StockTransaction;

class PenerimaanRepository {
    public function paginatePenerimaan($perPage = 20) {
        return StockTransaction::with(['product'])
        ->where('type', 'Masuk')
        ->where('status', 'Pending')->paginate($perPage);
    }

    public function findPenerimaanById($id) {
        return StockTransaction::with('product')->findOrFail($id);
    }

    public function updatePenerimaan($masuk, array $data) {
        return $masuk->update($data);
    }

    public function searchPenerimaan(string $keyword, $perPage = 20) {
        return StockTransaction::with(['product'])
            ->where('type', 'Masuk')
            ->where('status', 'Pending')
            ->whereHas('product', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%");
            })
            ->paginate($perPage);
    } 
}