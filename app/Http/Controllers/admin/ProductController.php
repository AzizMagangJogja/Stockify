<?php

namespace App\Http\Controllers\Admin;

use App\Models\Supplier;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\ProductService;

class ProductController extends Controller {
    protected $productService;

    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }

    public function index() {
        $product = $this->productService->getPaginatedProduct();

        $category = Categories::all();
        $supplier = Supplier::all();
        
        return view('pages.admin.produk.produk', compact('product', 'category', 'supplier'));
    }

    public function store(Request $request) {
        try {
            $this->productService->storeProduct($request->all());
            return redirect()->back()->with('success', 'Data Produk berhasil ditambahkan!');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }

    public function update(Request $request, $id) {
        try {
            $this->productService->updateProduct($id, $request->all());
            return redirect()->back()->with('success', 'Data Produk berhasil diperbarui!');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $this->productService->deleteProduct($id);
            return redirect()->back()->with('success', 'Data Produk berhasil dihapus!');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }

    public function show($id) {
        try {
            $product = $this->productService->getProductById($id);
            if (!$product) {
                return redirect()->back()->with('error', 'Produk tidak ditemukan!');
            }
            return view('pages.admin.produk.detail', compact('product'));
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }
}