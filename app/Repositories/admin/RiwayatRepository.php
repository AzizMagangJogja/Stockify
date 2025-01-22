<?php

namespace App\Repositories\Admin;

use App\Models\StockTransaction;

class RiwayatRepository {
    public function paginateRiwayat($perPage = 20) {
        return StockTransaction::with('product')->paginate($perPage);
    }
}
