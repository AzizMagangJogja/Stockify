<?php

namespace App\Services\Manager;

use App\Repositories\Manager\LapStokRepository;

class LapStokService {
    protected $lapstokRepository;

    public function __construct(LapStokRepository $lapstokRepository) {
        $this->lapstokRepository = $lapstokRepository;
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
}