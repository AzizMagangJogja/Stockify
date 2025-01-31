<?php

namespace App\Repositories\Admin;

use App\Models\UserActivity;

class LapAktivitasRepository {
    public function paginateLapAktivitas($filters = [], $perPage = 20) {
        return $this->applyFilters($filters)->paginate($perPage);
    }

    public function getFilteredLapAktivitas($filters = []) {
        return $this->applyFilters($filters)->get();
    }

    public function create(array $data) {
        return UserActivity::create($data);
    }

    protected function applyFilters($filters = []) {
        $query = UserActivity::latest();

        if (!empty($filters['user_id'])) {
            $query->where('user_id', $filters['user_id']);
        }

        if (!empty($filters['action'])) {
            $query->where('action', $filters['action']);
        }

        if (!empty($filters['start_date']) && !empty($filters['end_date'])) {
            $query->whereBetween('created_at', [$filters['start_date'], $filters['end_date']]);
        } elseif (!empty($filters['start_date'])) {
            $query->whereDate('created_at', '>=', $filters['start_date']);
        } elseif (!empty($filters['end_date'])) {
            $query->whereDate('created_at', '<=', $filters['end_date']);
        }

        return $query;
    }
}