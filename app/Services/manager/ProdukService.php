<?php

namespace App\Services\Manager;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Manager\ProdukRepository;
use App\Repositories\UserActivityRepository;
use App\Repositories\Manager\StockTransactionRepository;

class ProdukService {
    protected $produkRepository;
    protected $userActivityRepository;
    protected $stockTransactionRepository;

    public function __construct(
        ProdukRepository $produkRepository,
        UserActivityRepository $userActivityRepository,
        StockTransactionRepository $stockTransactionRepository
        ) {
            $this->produkRepository = $produkRepository;
            $this->userActivityRepository = $userActivityRepository;
            $this->stockTransactionRepository = $stockTransactionRepository;
    }

    public function getPaginatedProduct($perPage = 20) {
        return $this->produkRepository->paginateProduct($perPage);
    }

    public function storeProduct(array $data) {
        $validator = Validator::make($data, [
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'name' => 'required|string|max:255',
            'sku' => 'required|unique:products,sku',
            'description' => 'nullable|string',
            'purchase_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'quantity' => 'required|integer',
            'minimum_stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            throw new \Exception(implode(', ', $validator->errors()->all()));
        }

        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('products', 'public');
        }

        $product = $this->produkRepository->createProduct($data);

        $this->stockTransactionRepository->createTransaction([
            'product_id' => $product->id,
            'user_id' => auth()->id(),
            'type' => 'Masuk',
            'status' => 'Diterima',
            'quantity' => $data['quantity'],
            'date' => now(),
            'notes' => 'Tambah Produk',
        ]);

        $this->userActivityRepository->createActivity([
            'user_id' => auth()->id(),
            'action' => 'Menambah',
            'activity' => 'Produk baru: ' . $product->name
        ]);

        return $product;
    }

    public function updateProduct($id, array $data) {
        $product = $this->produkRepository->findProductById($id);
    
        $validator = Validator::make($data, [
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'name' => 'required|string|max:255',
            'sku' => 'required|unique:products,sku,' . $id,
            'description' => 'nullable|string',
            'purchase_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    
        if ($validator->fails()) {
            throw new \Exception(implode(', ', $validator->errors()->all()));
        }
    
        if (isset($data['image']) && $data['image']) {
            $data['image'] = $data['image']->store('products', 'public');
        } else {
            $data['image'] = $product->image ?? null;
        }
    
        $oldProduct = clone $product;
        $this->produkRepository->updateProduct($product, $data);
    
        $changes = [];
        if ($oldProduct->name != $data['name']) {
            $changes[] = 'nama dari "' . $oldProduct->name . '" ke "' . $data['name'] . '"';
        }
        if ($oldProduct->category_id != $data['category_id']) {
            $changes[] = 'kategori dari "' . $oldProduct->category->name . '" ke "' . $product->category->name . '"';
        }
        if ($oldProduct->supplier_id != $data['supplier_id']) {
            $changes[] = 'supplier dari "' . $oldProduct->supplier->name . '" ke "' . $product->supplier->name . '"';
        }
        if ($oldProduct->sku != $data['sku']) {
            $changes[] = 'SKU dari "' . $oldProduct->sku . '" ke "' . $data['sku'] . '"';
        }
        if ($oldProduct->description != $data['description']) {
            $oldDesc = $oldProduct->description ?: 'kosong';
            $newDesc = $data['description'] ?: 'kosong';
            $changes[] = 'deskripsi dari "' . $oldDesc . '" ke "' . $newDesc . '"';
        }
        if ($oldProduct->purchase_price != $data['purchase_price']) {
            $changes[] = 'harga beli dari ' . $oldProduct->purchase_price . ' ke ' . $data['purchase_price'];
        }
        if ($oldProduct->selling_price != $data['selling_price']) {
            $changes[] = 'harga jual dari ' . $oldProduct->selling_price . ' ke ' . $data['selling_price'];
        }
        if ($oldProduct->image != $data['image']) {
            $changes[] = 'gambar diperbarui';
        }
    
        $activityDetails = $changes ? implode(', ', $changes) : 'tidak ada perubahan';
        $this->userActivityRepository->createActivity([
            'user_id' => auth()->id(),
            'action' => 'Mengupdate',
            'activity' => 'Produk: ' . $product->name . ' (' . $activityDetails . ')'
        ]);

        return $product;
    }

    public function deleteProduct($id) {
        $product = $this->produkRepository->findProductById($id);
        $this->produkRepository->deleteProduct($product);

        $this->userActivityRepository->createActivity([
            'user_id' => auth()->id(),
            'action' => 'Menghapus',
            'activity' => 'Produk: ' . $product->name
        ]);

        return $product;
    }

    public function getProductById($id) {
        return $this->produkRepository->findProductById($id);
    }

    public function searchProduct(string $keyword, $perPage = 20) {
        return $this->produkRepository->searchProduct($keyword, $perPage);
    }

    public function exportProduk(string $keyword = null)
    {
        $products = $keyword 
            ? $this->produkRepository->searchProduct($keyword)
            : $this->produkRepository->paginateProduct();

        $pdf = Pdf::loadView('pages.export.prod-export', compact('products'));

        $this->userActivityRepository->createActivity([
            'user_id' => auth()->id(),
            'action' => 'Export',
            'activity' => 'Mengekspor data produk ke PDF'
        ]);

        return $pdf->download('Produk.pdf');
    }
}