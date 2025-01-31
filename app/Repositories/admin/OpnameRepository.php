<?php

namespace App\Repositories\Admin;

use App\Models\Products;

class OpnameRepository {
    public function paginateOpname($perPage = 20) {
        return Products::paginate($perPage);
    }

    public function searchOpname(string $keyword, $perPage = 20) {
        return Products::where('name', 'LIKE', "%{$keyword}%")
            ->paginate($perPage);
    }
}