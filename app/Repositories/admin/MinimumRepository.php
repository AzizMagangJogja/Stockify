<?php

namespace App\Repositories\Admin;

use App\Models\Products;
use App\Models\UserActivity;

class MinimumRepository {
    public function paginateMinimum($perPage = 20) {
        return Products::paginate($perPage);
    }
    
    public function findMinimumById($id) {
        return Products::findOrFail($id);
    }

    public function updateMinimum($minimum, array $data) {
        return $minimum->update($data);
    }

    public function searchMinimum(string $keyword, $perPage = 20) {
        return Products::where('name', 'LIKE', "%{$keyword}%")
            ->paginate($perPage);
    }
}

class UserActivityRepository {
    public function createActivity(array $data) {
        return UserActivity::create($data);
    }
}