<?php

namespace App\Repositories\Admin;

use App\Models\Products;

class OpnameRepository {
    public function paginateOpname($perPage = 20) {
        return Products::paginate($perPage);
    }
}