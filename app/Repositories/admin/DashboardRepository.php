<?php

namespace App\Repositories\Admin;

use App\Models\Products;
use App\Models\StockTransaction;
use App\Models\UserActivity;
use Carbon\Carbon;

class DashboardRepository {
    public function jumlahProduk() {
        return Products::count();
    }
    
    public function tampilanAktivitas($perPage = 15) {
        return UserActivity::whereDate('created_at', now()->toDateString())
        ->latest()
        ->paginate($perPage);
    }

    public function jumlahMasukMingguan() {
        $startDate = Carbon::now()->subDays(7)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        return StockTransaction::where('type', 'Masuk')
        ->where('status', 'Diterima')
        ->whereBetween('updated_at', [$startDate, $endDate])
        ->count();
    }

    public function jumlahKeluarMingguan() {
        $startDate = Carbon::now()->subDays(7)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        return StockTransaction::where('type', 'Keluar')
        ->where('status', 'Dikeluarkan')
        ->whereBetween('updated_at', [$startDate, $endDate])
        ->count();
    }

    public function grafikStokBarang() {
        return Products::select('name', 'quantity', 'minimum_stock')->get();
    }
}
