<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\RiwayatService;

class RiwayatController extends Controller
{
    protected $riwayatService;

    public function __construct(RiwayatService $riwayatService)
    {
        $this->riwayatService = $riwayatService;
    }

    public function index(Request $request) {
        try {
            $keyword = $request->get('search');
            $stoktransaction = $keyword 
                ? $this->riwayatService->searchRiwayat($keyword) 
                : $this->riwayatService->getPaginatedRiwayat();
            return view('pages.admin.stok.riwayat', compact('stoktransaction'));
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }
}
