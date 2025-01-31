<?php

namespace App\Repositories\Manager;

use App\Models\UserActivity;
use App\Models\StockTransaction;

class MasukRepository {
    public function paginateMasuk($perPage = 20) {
        return StockTransaction::with(['product'])->where('type', 'Masuk')->where('status', 'Pending')->paginate($perPage);
    }

    public function createMasuk(array $data) {
        return StockTransaction::create($data);
    }

    public function findMasukById($id) {
        return StockTransaction::with('product')->findOrFail($id);
    }

    public function updateMasuk($masuk, array $data) {
        return $masuk->update($data);
    }

    public function deleteMasuk($masuk) {
        return $masuk->delete();
    }

    public function searchMasuk(string $keyword, $perPage = 20) {
        return StockTransaction::with(['product'])
            ->where('type', 'Masuk')
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