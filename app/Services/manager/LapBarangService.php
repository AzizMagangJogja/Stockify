<?php

namespace App\Services\Manager;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Manager\LapBarangRepository;

class LapBarangService {
    protected $lapbarangRepository;

    public function __construct(LapBarangRepository $lapbarangRepository) {
        $this->lapbarangRepository = $lapbarangRepository;
    }

    private function LogActivity(string $activity) {
        $this->lapbarangRepository->create([
            'user_id' => Auth::id(),
            'action' => 'Export',
            'activity' => $activity,
        ]);
    }

    public function getPaginatedLapBarang($filters = [], $perPage = 20) {
        $lapbarang = $this->lapbarangRepository->paginateLapBarang($filters, $perPage);

        foreach ($lapbarang as $item) {
            $item->stok_masuk = $this->lapbarangRepository->getStokMasuk($item->product_id);
            $item->stok_keluar = $this->lapbarangRepository->getStokKeluar($item->product_id);
        }

        return $lapbarang;
    }

    public function exportLapBarang($filters = [])
    {
        $this->LogActivity('Mengekspor laporan barang masuk dan keluar ke PDF.');
        $lapbarang = $this->getPaginatedLapBarang($filters);
        $pdf = Pdf::loadView('pages.export.masuk-keluar-export', compact('lapbarang'));

        return $pdf->download('Laporan Barang Masuk dan Keluar.pdf');
    }
}