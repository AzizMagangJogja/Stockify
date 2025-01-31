<?php

namespace App\Services\Admin;

use App\Repositories\Admin\RiwayatRepository;

class RiwayatService {
    protected $riwayatRepository;

    public function __construct(RiwayatRepository $riwayatRepository) {
        $this->riwayatRepository = $riwayatRepository;
    }

    public function getPaginatedRiwayat($perPage = 20) {
        $transactions = $this->riwayatRepository->paginateRiwayat($perPage);
        
        foreach ($transactions as $transaction) {
            if ($transaction->type == 'Masuk' && $transaction->status == 'Diterima') {
                $transaction->total_price = $transaction->quantity * $transaction->product->purchase_price;
            } elseif ($transaction->type == 'Keluar' && $transaction->status == 'Dikeluarkan') {
                $transaction->total_price = $transaction->quantity * $transaction->product->selling_price;
            } else {
                $transaction->total_price = 0;
            }
        }
        
        return $transactions;
    }

    public function searchRiwayat(string $keyword, $perPage = 20) {
        return $this->riwayatRepository->searchRiwayat($keyword, $perPage);
    }
}