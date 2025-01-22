<?php

namespace App\Repositories\Manager;

use App\Models\Products;

class OpnameRepository {
    public function paginateOpname($perPage = 20) {
        return Products::paginate($perPage);
    }
}