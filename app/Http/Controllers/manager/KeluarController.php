<?php

namespace App\Http\Controllers\Manager;

use App\Models\Products;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Manager\KeluarService;

class KeluarController extends Controller
{
    protected $keluarService;

    public function __construct(KeluarService $keluarService)
    {
        $this->keluarService = $keluarService;
    }

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $keluar = $keyword 
                ? $this->keluarService->searchKeluar($keyword) 
                : $this->keluarService->getPaginatedKeluar();
        $product = Products::all();
        return view('pages.manager.stok.keluar', compact('keluar', 'product'));
    }

    public function store(Request $request)
    {
        try {
            $this->keluarService->storeKeluar($request->all());
            return redirect()->back()->with('success', 'Transaksi berhasil ditambahkan!');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $this->keluarService->updateKeluar($id, $request->all());
            return redirect()->back()->with('success', 'Transaksi berhasil diupdate!');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $this->keluarService->deleteKeluar($id);
            return redirect()->back()->with('success', 'Transaksi berhasil dihapus!');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }
}
