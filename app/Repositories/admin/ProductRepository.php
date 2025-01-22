<?php

namespace App\Repositories\Admin;

use App\Models\Products;
use App\Models\UserActivity;
use App\Models\StockTransaction;

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
}

class UserActivityRepository {
    public function createActivity(array $data) {
        return UserActivity::create($data);
    }
}

class StockTransactionRepository {
    public function createTransaction(array $data) {
        return StockTransaction::create($data);
    }
}