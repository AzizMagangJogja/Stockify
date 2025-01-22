<?php

namespace App\Repositories\Admin;

use App\Models\Setting;
use App\Models\UserActivity;

class PengaturanRepository {
    public function getFirstPengaturan() {
        return Setting::first();
    }

    public function updatePengaturan($id, $data) {
        $pengaturan = Setting::findOrFail($id);
        $pengaturan->update($data);
        return $pengaturan;
    }
}

class UserActivityRepository {
    public function createActivity(array $data) {
        return UserActivity::create($data);
    }
}