<?php

namespace App\Repositories\Admin;

use App\Models\Products;
use App\Models\StockTransaction;
use Maatwebsite\Excel\Facades\Excel;

class ProductRepository {
    public function paginateProduct($perPage = 20) {
        return Products::with(['category', 'supplier'])->paginate($perPage);
    }

    public function createProduct(array $data) {
        return Products::create($data);
    }

    public function findProductById($id) {
        return Products::with(['category', 'supplier'])->findOrFail($id);
    }

    public function updateProduct($product, array $data) {
        return $product->update($data);
    }

    public function deleteProduct($product) {
        return $product->delete();
    }

    public function searchProduct(string $keyword, $perPage = 20) {
        return Products::where('name', 'LIKE', "%{$keyword}%")
            ->orWhere('sku', 'LIKE', "%{$keyword}%")
            ->orWhere('description', 'LIKE', "%{$keyword}%")
            ->paginate($perPage);
    }

    public function importProduct($file, $importClass) {
        Excel::import($importClass, $file);
    }

    public function getImportedProducts() {
        return Products::where('created_at', '>=', now())
                      ->get();
    }
}

class StockTransactionRepository {
    public function createTransaction(array $data) {
        return StockTransaction::create($data);
    }
}