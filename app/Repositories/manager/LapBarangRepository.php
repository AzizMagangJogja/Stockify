<?php

namespace App\Repositories\Manager;

use App\Models\StockTransaction;

class LapBarangRepository {
    public function paginateLapBarang($filters = [], $perPage = 20) {
        $query = StockTransaction::with('product');

        if (!empty($filters['type'])) {
            $query->where('type', $filters['type']);
        }

        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (!empty($filters['start_date']) && !empty($filters['end_date'])) {
            $query->whereBetween('created_at', [$filters['start_date'], $filters['end_date']]);
        } elseif (!empty($filters['start_date'])) {
            $query->whereDate('created_at', '>=', $filters['start_date']);
        } elseif (!empty($filters['end_date'])) {
            $query->whereDate('created_at', '<=', $filters['end_date']);
        }

        return $query->paginate($perPage);
    }

    public function getStokMasuk($productId) {
        return StockTransaction::where('product_id', $productId)
            ->where('type', 'Masuk')
            ->where('status', 'Diterima')
            ->sum('quantity');
    }
    
    public function getStokKeluar($productId) {
        return StockTransaction::where('product_id', $productId)
            ->where('type', 'Keluar')
            ->where('status', 'Dikeluarkan')
            ->sum('quantity');
    }    
}