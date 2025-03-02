<?php

namespace App\Services\Admin;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Admin\LapTransRepository;

class LapTransService {
    protected $laptransRepository;

    public function __construct(LapTransRepository $laptransRepository) {
        $this->laptransRepository = $laptransRepository;
    }

    private function LogActivity(string $activity) {
        $this->laptransRepository->create([
            'user_id' => Auth::id(),
            'action' => 'Export',
            'activity' => $activity,
        ]);
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

    public function exportLapTrans($filters = [])
    {
        $this->LogActivity('Mengekspor laporan transaksi ke PDF.');
        $laptrans = $this->getPaginatedLapTrans($filters);
        $pdf = Pdf::loadView('pages.export.transaksi-export', compact('laptrans'));

        return $pdf->download('Laporan Transaksi.pdf');
    }
}