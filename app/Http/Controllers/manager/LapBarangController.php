<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Services\Manager\LapBarangService;
use Illuminate\Http\Request;

class LapBarangController extends Controller
{
    protected $lapbarangService;

    public function __construct(LapBarangService $lapbarangService)
    {
        $this->lapbarangService = $lapbarangService;
    }

    public function index(Request $request) {
        $filters = $request->only(['type', 'status', 'start_date', 'end_date']);
        $lapbarang = $this->lapbarangService->getPaginatedLapBarang($filters);
    
        return view('pages.manager.laporan.masuk_keluar', compact('filters', 'lapbarang'));
    }
}