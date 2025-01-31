<?php

namespace App\Http\Controllers\Manager;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Manager\MasukService;

class MasukController extends Controller
{
    protected $masukService;

    public function __construct(MasukService $masukService)
    {
        $this->masukService = $masukService;
    }

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $masuk = $keyword 
                ? $this->masukService->searchMasuk($keyword) 
                : $this->masukService->getPaginatedMasuk();
        $product = Products::all();
        return view('pages.manager.stok.masuk', compact('masuk', 'product'));
    }

    public function store(Request $request)
    {
        try {
            $this->masukService->storeMasuk($request->all());
            return redirect()->back()->with('success', 'Transaksi berhasil ditambahkan!');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $this->masukService->updateMasuk($id, $request->all());
            return redirect()->back()->with('success', 'Transaksi berhasil diupdate!');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $this->masukService->deleteMasuk($id);
            return redirect()->back()->with('success', 'Transaksi berhasil dihapus!');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }
}