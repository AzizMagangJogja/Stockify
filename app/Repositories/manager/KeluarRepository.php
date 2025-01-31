<?php

namespace App\Repositories\Manager;

use App\Models\UserActivity;
use App\Models\StockTransaction;

class KeluarRepository {
    public function paginateKeluar($perPage = 20) {
        return StockTransaction::with(['product'])->where('type', 'Keluar')->where('status', 'Pending')->paginate($perPage);
    }

    public function createKeluar(array $data) {
        return StockTransaction::create($data);
    }

    public function findKeluarById($id) {
        return StockTransaction::with('product')->findOrFail($id);
    }

    public function updateKeluar($keluar, array $data) {
        return $keluar->update($data);
    }

    public function deleteKeluar($keluar) {
        return $keluar->delete();
    }

    public function searchKeluar(string $keyword, $perPage = 20) {
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