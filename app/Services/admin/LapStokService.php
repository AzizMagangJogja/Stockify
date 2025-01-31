<?php

namespace App\Services\Admin;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Admin\LapStokRepository;

class LapStokService {
    protected $lapstokRepository;

    public function __construct(LapStokRepository $lapstokRepository) {
        $this->lapstokRepository = $lapstokRepository;
    }

    private function LogActivity(string $activity) {
        $this->lapstokRepository->create([
            'user_id' => Auth::id(),
            'action' => 'Export',
            'activity' => $activity,
        ]);
    }

    public function getPaginatedLapStok($filters = [], $perPage = 20) {
        return $this->lapstokRepository->paginateLapStok($filters, $perPage);
    }

    public function getProcessedLapStok($filters = [], $perPage = 20) {
        $lapstok = $this->getPaginatedLapStok($filters, $perPage);

        foreach ($lapstok as $laps) {
            $laps->masuk = $laps->transactions->where('type', 'Masuk')->where('status', 'Diterima')->sum('quantity');
            $laps->keluar = $laps->transactions->where('type', 'Keluar')->where('status', 'Dikeluarkan')->sum('quantity');
        }

        return $lapstok;
    }

    public function exportLapStok($filters = [])
    {
        $this->LogActivity('Mengekspor laporan stok ke PDF.');
        $lapstok = $this->getProcessedLapStok($filters);
        $pdf = Pdf::loadView('pages.export.stok-export', compact('lapstok'));

        return $pdf->download('Laporan Stok.pdf');
    }
}