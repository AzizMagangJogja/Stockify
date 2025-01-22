<?php

namespace App\Repositories\Admin;

use App\Models\StockTransaction;

class LapTransRepository {
    public function paginateLapTrans($filters = [], $perPage = 20) {
        $query = StockTransaction::with(['product.category']);

        if (!empty($filters['category_id'])) {
            $query->whereHas('product', function ($q) use ($filters) {
                $q->where('category_id', $filters['category_id']);
            });
        }

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
}