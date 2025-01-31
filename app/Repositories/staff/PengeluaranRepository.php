<?php

namespace App\Repositories\Staff;

use App\Models\UserActivity;
use App\Models\StockTransaction;

class PengeluaranRepository {
    public function paginatePengeluaran($perPage = 20) {
        return StockTransaction::with(['product'])
        ->where('type', 'Keluar')
        ->where('status', 'Pending')->paginate($perPage);
    }

    public function findPengeluaranById($id) {
        return StockTransaction::with('product')->findOrFail($id);
    }

    public function updatePengeluaran($keluar, array $data) {
        return $keluar->update($data);
    }

    public function searchPengeluaran(string $keyword, $perPage = 20) {
        return StockTransaction::with(['product'])
            ->where('type', 'Keluar')
            ->where('status', 'Pending')
            ->whereHas('product', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%");
            })
            ->paginate($perPage);
    } 
}

class UserActivityRepository {
    public function createActivity(array $data) {
        return UserActivity::create($data);
    }
}