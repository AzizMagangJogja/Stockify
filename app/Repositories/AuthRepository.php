<?php

namespace App\Repositories;

use App\Models\UserActivity;

class AuthRepository {
    public function logActivity($data)
    {
        return UserActivity::create($data);
    }
}