<?php

namespace App\Services\Admin;

use App\Repositories\Admin\LapAktivitasRepository;

class LapAktivitasService {
    protected $lapaktivitasRepository;

    public function __construct(LapAktivitasRepository $lapaktivitasRepository) {
        $this->lapaktivitasRepository = $lapaktivitasRepository;
    }

    public function getPaginatedLapAktivitas($filters = [], $perPage = 20) {
        return $this->lapaktivitasRepository->paginateLapAktivitas($filters, $perPage);
    }
}