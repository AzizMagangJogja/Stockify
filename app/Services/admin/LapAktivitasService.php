<?php

namespace App\Services\Admin;

use App\Repositories\Admin\LapAktivitasRepository;
use Barryvdh\DomPDF\Facade\Pdf;

class LapAktivitasService {
    protected $lapaktivitasRepository;

    public function __construct(LapAktivitasRepository $lapaktivitasRepository) {
        $this->lapaktivitasRepository = $lapaktivitasRepository;
    }

    public function getPaginatedLapAktivitas($filters = [], $perPage = 20) {
        $filters = array_filter($filters);
        return $this->lapaktivitasRepository->paginateLapAktivitas($filters, $perPage);
    }

    public function exportLapAktivitas($filters = [], $userId) {
        $filters = array_filter($filters);
        $useractivity = $this->lapaktivitasRepository->getFilteredLapAktivitas($filters);

        $this->lapaktivitasRepository->create([
            'user_id' => $userId,
            'action' => 'Export',
            'activity' => 'Mengekspor laporan aktivitas user ke PDF.',
        ]);

        $pdf = Pdf::loadView('pages.export.aktivitas-export', compact('useractivity', 'filters'));

        return $pdf->download('Laporan Aktivitas User.pdf');
    }
}