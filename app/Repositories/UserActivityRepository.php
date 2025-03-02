<?php

namespace App\Repositories;

use App\Models\UserActivity;

class UserActivityRepository {
    public function createActivity(array $data) {
        return UserActivity::create($data);
    }
}