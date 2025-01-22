<?php

namespace App\Services\Admin;

use App\Repositories\Admin\LapTransRepository;

class LapTransService {
    protected $laptransRepository;

    public function __construct(LapTransRepository $laptransRepository) {
        $this->laptransRepository = $laptransRepository;
    }

    public function getPaginatedLapTrans($filters = [], $perPage = 20) {
        $laptransacton = $this->laptransRepository->paginateLapTrans($filters, $perPage);

        foreach ($laptransacton as $transaction) {
            if ($transaction->type == 'Masuk' && $transaction->status == 'Diterima') {
                $transaction->total_price = $transaction->quantity * $transaction->product->purchase_price;
            } elseif ($transaction->type == 'Keluar' && $transaction->status == 'Dikeluarkan') {
                $transaction->total_price = $transaction->quantity * $transaction->product->selling_price;
            } elseif ($transaction->status == 'Pending') {
                $transaction->total_price = 0;
            } else {
                $transaction->total_price = 0;
            }
        }
        
        return $laptransacton;
    }
}