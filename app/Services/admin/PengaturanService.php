<?php

namespace App\Services\Admin;

use Illuminate\Http\Request;
use App\Repositories\Admin\PengaturanRepository;
use App\Repositories\Admin\UserActivityRepository;

class PengaturanService {
    protected $pengaturanRepository;
    protected $userActivityRepository;

    public function __construct(
        PengaturanRepository $pengaturanRepository,
        UserActivityRepository $userActivityRepository
    ) {
        $this->pengaturanRepository = $pengaturanRepository;
        $this->userActivityRepository = $userActivityRepository;
    }

    public function getPengaturan() {
        return $this->pengaturanRepository->getFirstPengaturan();
    }

    public function updatePengaturan($id, Request $request) {
        $pengaturan = $this->pengaturanRepository->getFirstPengaturan();

        $request->validate([
            'name' => 'nullable|string|max:255',
            'logo' => 'nullable|string'
        ]);

        $changes = [];

        if ($request->filled('logo') && $request->input('logo') !== $pengaturan->logo) {
            $oldLogo = $pengaturan->logo;
            $newLogo = $request->input('logo');
            $pengaturan->logo = $newLogo;
            $changes[] = "Logo aplikasi diperbarui.";
        }

        if ($request->filled('name') && $request->input('name') !== $pengaturan->name) {
            $oldName = $pengaturan->name;
            $newName = $request->input('name');
            $pengaturan->name = $newName;
            $changes[] = "Nama aplikasi diubah dari \"$oldName\" menjadi \"$newName\".";
        }

        $pengaturan->save();

        if (!empty($changes)) {
            $this->userActivityRepository->createActivity([
                'user_id' => auth()->user()->id,
                'action' => 'Mengupdate',
                'activity' => implode(' ', $changes),
            ]);
        }

        return $pengaturan;
    }
}