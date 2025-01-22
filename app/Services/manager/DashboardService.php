<?php

namespace App\Services\Manager;

use App\Repositories\Manager\DashboardRepository;

class DashboardService {
    protected $dashboardRepository;

    public function __construct(DashboardRepository $dashboardRepository) 
    {
        $this->dashboardRepository = $dashboardRepository;
    }

    public function getStokMenipis() {
        return $this->dashboardRepository->getStokMenipis();
    }

    public function getBarangMasukToday() {
        return $this->dashboardRepository->getTransaksiTodayByType('Masuk', 'Diterima');
    }

    public function getBarangKeluarToday() {
        return $this->dashboardRepository->getTransaksiTodayByType('Keluar', 'Dikeluarkan');
    }
}