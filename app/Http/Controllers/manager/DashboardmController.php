<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Services\Manager\DashboardService;

class DashboardmController extends Controller {
    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index() {
        $stokMenipis = $this->dashboardService->getStokMenipis();
        $barangMasuk = $this->dashboardService->getBarangMasukToday();
        $barangKeluar = $this->dashboardService->getBarangKeluarToday();

        return view('pages.manager.index', compact('stokMenipis', 'barangMasuk', 'barangKeluar'));
    }
}