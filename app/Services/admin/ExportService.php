<?php

namespace App\Services\Admin;

use App\Exports\LapActivityExport;
use App\Exports\LapStokExport;
use App\Exports\LapTransExport;
use App\Exports\ProductsExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\Admin\ExportRepository;

class ExportService {
    protected $exportRepository;

    public function __construct(ExportRepository $exportRepository) {
        $this->exportRepository = $exportRepository;
    }

    private function LogActivity(string $activity) {
        $this->exportRepository->create([
            'user_id' => Auth::id(),
            'action' => 'Export',
            'activity' => $activity,
        ]);
    }

    public function exportLapStok() {
        $this->LogActivity('Mengekspor laporan stok');
        return Excel::download(new LapStokExport, 'Laporan Stok.xlsx');
    }

    public function exportLapTrans() {
        $this->LogActivity('Mengekspor laporan transaksi');
        return Excel::download(new LapTransExport, 'Laporan Transaksi.xlsx');
    }

    public function exportLapAktivitas() {
        $this->LogActivity('Mengekspor laporan log activity user');
        return Excel::download(new LapActivityExport, 'Laporan Log Activity User.xlsx');
    }

    public function exportProduk() {
        $this->LogActivity('Mengekspor data produk');
        return Excel::download(new ProductsExport, 'Produk.xlsx');
    }
}
