<?php

namespace App\Http\Controllers\Staff;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Staff\PengeluaranService;

class PengeluaranController extends Controller
{
    protected $pengeluaranService;

    public function __construct(PengeluaranService $pengeluaranService)
    {
        $this->pengeluaranService = $pengeluaranService;
    }

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $keluar = $keyword 
                ? $this->pengeluaranService->searchPengeluaran($keyword) 
                : $this->pengeluaranService->getPaginatedPengeluaran();
        $product = Products::all();
        return view('pages.staff.stok.pengeluaran', compact('keluar', 'product'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->pengeluaranService->updatePengeluaran($id, $request->all());
            return redirect()->back()->with('success', 'Status produk diupdate!');
        } catch (\Exception $error){
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }
}