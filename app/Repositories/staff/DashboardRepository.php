<?php

namespace App\Repositories\Staff;

use App\Models\StockTransaction;

class DashboardRepository {
    public function paginateDashboard($filters = [], $perPage = 20) {
        $query = StockTransaction::query();

        $query->where('status', 'Pending');

        if (!empty($filters['type'])) {
            $query->where('type', $filters['type']);
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