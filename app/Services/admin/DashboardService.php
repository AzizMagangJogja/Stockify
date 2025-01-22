<?php

namespace App\Services\Admin;

use App\Repositories\Admin\DashboardRepository;

class DashboardService {
    protected $dashboardRepository;

    public function __construct(DashboardRepository $dashboardRepository) {
        $this->dashboardRepository = $dashboardRepository;
    }

    public function getJumlahProduk() {
        return $this->dashboardRepository->jumlahProduk();
    }

    public function getTampilanAktivitas($perPage = 15) {
        return $this->dashboardRepository->tampilanAktivitas($perPage);
    }

    public function getJumlahMasukMingguan() {
        return $this->dashboardRepository->jumlahMasukMingguan();
    }

    public function getJumlahKeluarMingguan() {
        return $this->dashboardRepository->jumlahKeluarMingguan();
    }

    public function getGrafikStokBarang() {
        return $this->dashboardRepository->grafikStokBarang();
    }
}
