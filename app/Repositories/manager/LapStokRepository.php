<?php

namespace App\Repositories\Manager;

use App\Models\Products;
use App\Models\UserActivity;

class LapStokRepository {
    public function create(array $data) {
        return UserActivity::create($data);
    }
    
    public function paginateLapStok($filters = [], $perPage = 20) {
        $query = Products::query();

        if (!empty($filters['category_id'])) {
            $query->where('category_id', $filters['category_id']);
        }

        $query->with(['transactions' => function ($transactionQuery) use ($filters) {
            if (!empty($filters['start_date']) && !empty($filters['end_date'])) {
                $transactionQuery->whereBetween('created_at', [$filters['start_date'], $filters['end_date']]);
            } elseif (!empty($filters['start_date'])) {
                $transactionQuery->whereDate('created_at', '>=', $filters['start_date']);
            } elseif (!empty($filters['end_date'])) {
                $transactionQuery->whereDate('created_at', '<=', $filters['end_date']);
            }
        }]);

        return $query->paginate($perPage);
    }
}