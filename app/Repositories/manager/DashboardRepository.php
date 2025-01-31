<?php

namespace App\Repositories\Manager;

use Carbon\Carbon;
use App\Models\Products;
use App\Models\StockTransaction;
use Illuminate\Support\Facades\DB;

class DashboardRepository
{
    public function getStokMenipis()
    {
        return Products::whereColumn('quantity', '<=', DB::raw('minimum_stock + 5'))
        ->orderBy('quantity', 'asc')
        ->get();
    }

    public function getTransaksiTodayByType($type, $status = null)
    {
        $query = StockTransaction::where('type', $type)
            ->whereDate('updated_at', Carbon::today());

        if (!is_null($status)) {
            $query->where('status', $status);
        }

        return $query->limit(10)->get();
    }
}