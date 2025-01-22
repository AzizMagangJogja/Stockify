<?php

namespace App\Http\Controllers\Staff;

use App\Models\Products;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Staff\PenerimaanService;

class PenerimaanController extends Controller
{
    protected $penerimaanService;

    public function __construct(PenerimaanService $penerimaanService)
    {
        $this->penerimaanService = $penerimaanService;
    }

    public function index()
    {
        $masuk = $this->penerimaanService->getPaginatedPenerimaan();
        $product = Products::all();
        return view('pages.staff.stok.penerimaan', compact('masuk', 'product'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->penerimaanService->updatePenerimaan($id, $request->all());
            return redirect()->back()->with('success', 'Status produk diupdate!');
        } catch (\Exception $error){
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }
}