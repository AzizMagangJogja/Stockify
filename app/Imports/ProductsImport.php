<?php

namespace App\Imports;

use App\Models\Products;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Products([
            'category_id' => $row[1],
            'supplier_id' => $row[2],
            'name' => $row[3],
            'sku' => $row[4],
            'description' => $row[5],
            'purchase_price' => $row[6],
            'selling_price' => $row[7],
            'image' => $row[8],
            'quantity' => $row[9],
            'minimum_stock' => $row[10]
        ]);
    }
}
