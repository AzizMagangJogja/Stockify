<?php

namespace App\Repositories\Admin;

use App\Models\StockTransaction;

class RiwayatRepository {
    public function paginateRiwayat($perPage = 20) {
        return StockTransaction::with('product')->paginate($perPage);
    }

    public function searchRiwayat(string $keyword, $perPage = 20) {
        return StockTransaction::with(['product'])
            ->orWhereHas('product', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%");
            })
            ->paginate($perPage);
    }
}