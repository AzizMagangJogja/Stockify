<?php

namespace App\Repositories\Admin;

use Maatwebsite\Excel\Facades\Excel;

class ImportRepository {
    public function importProduct($file, $importClass) {
        Excel::import($importClass, $file);
    }
}