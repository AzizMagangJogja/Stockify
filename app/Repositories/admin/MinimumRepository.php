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
}

class UserActivityRepository {
    public function createActivity(array $data) {
        return UserActivity::create($data);
    }
}