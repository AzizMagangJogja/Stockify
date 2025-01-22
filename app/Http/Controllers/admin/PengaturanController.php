<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\PengaturanService;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    protected $pengaturanService;

    public function __construct(PengaturanService $pengaturanService)
    {
        $this->pengaturanService = $pengaturanService;
    }

    public function index()
    {
        $pengaturan = $this->pengaturanService->getPengaturan();
        return view('pages.admin.pengaturan', compact('pengaturan'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->pengaturanService->updatePengaturan($id, $request);
            return redirect()->back()->with('success', 'Pengaturan Aplikasi berhasil diupdate!');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }
}