<?php

namespace App\Repositories\Admin;

use App\Models\Setting;

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