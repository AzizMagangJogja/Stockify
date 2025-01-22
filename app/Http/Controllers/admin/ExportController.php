<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\ExportService;

class ExportController extends Controller
{
    protected $exportService;

    public function __construct(ExportService $exportService)
    {
        $this->exportService = $exportService;
    }

    public function exportLapStok() {
        return $this->exportService->exportLapStok();
    }

    public function exportLapTrans() {
        return $this->exportService->exportLapTrans();
    }

    public function exportLapAktivitas() {
        return $this->exportService->exportLapAktivitas();
    }

    public function exportProduk() {
        return $this->exportService->exportProduk();
    }
}
