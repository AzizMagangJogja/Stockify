<?php

namespace App\Repositories\Admin;

use App\Models\UserActivity;

class ExportRepository {
    public function create(array $data) {
        return UserActivity::create($data);
    }
}