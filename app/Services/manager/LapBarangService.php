<?php

namespace App\Services\Manager;

use App\Repositories\Manager\LapBarangRepository;

class LapBarangService {
    protected $lapbarangRepository;

    public function __construct(LapBarangRepository $lapbarangRepository) {
        $this->lapbarangRepository = $lapbarangRepository;
    }

    public function getPaginatedLapBarang($filters = [], $perPage = 20) {
        $lapbarang = $this->lapbarangRepository->paginateLapBarang($filters, $perPage);

    foreach ($lapbarang as $item) {
        $item->stok_masuk = $this->lapbarangRepository->getStokMasuk($item->product_id);
        $item->stok_keluar = $this->lapbarangRepository->getStokKeluar($item->product_id);
    }

    return $lapbarang;
    }
}