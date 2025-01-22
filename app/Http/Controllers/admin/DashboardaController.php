<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\DashboardService;

class DashboardaController extends Controller {
    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index() {
        $jumlahProduk = $this->dashboardService->getJumlahProduk();
        $jumlahMasuk = $this->dashboardService->getJumlahMasukMingguan();
        $jumlahKeluar = $this->dashboardService->getJumlahKeluarMingguan();
        $aktivitasUser = $this->dashboardService->getTampilanAktivitas();
        $grafikStok = $this->dashboardService->getGrafikStokBarang();

        return view('pages.admin.index', compact('jumlahProduk', 'jumlahMasuk', 'jumlahKeluar', 'aktivitasUser', 'grafikStok'));
    }
}