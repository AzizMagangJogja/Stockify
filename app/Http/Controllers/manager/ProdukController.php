<?php

namespace App\Http\Controllers\Manager;

use App\Models\Supplier;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Manager\ProdukService;

class ProdukController extends Controller
{
    protected $produkService;

    public function __construct(ProdukService $produkService)
    {
        $this->produkService = $produkService;
    }

    public function index() {
        $product = $this->produkService->getPaginatedProduct();

        $category = Categories::all();
        $supplier = Supplier::all();
        
        return view('pages.manager.produk.produk', compact('product', 'category', 'supplier'));
    }

    public function store(Request $request) {
        try {
            $this->produkService->storeProduct($request->all());
            return redirect()->back()->with('success', 'Data Produk berhasil ditambahkan!');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }

    public function update(Request $request, $id) {
        try {
            $this->produkService->updateProduct($id, $request->all());
            return redirect()->back()->with('success', 'Data Produk berhasil diperbarui!');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $this->produkService->deleteProduct($id);
            return redirect()->back()->with('success', 'Data Produk berhasil dihapus!');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }

    public function show($id) {
        try {
            $product = $this->produkService->getProductById($id);
            if (!$product) {
                return redirect()->back()->with('error', 'Produk tidak ditemukan!');
            }
            return view('pages.manager.produk.detail', compact('product'));
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }
}