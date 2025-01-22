<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\CategoriesService;

class CategoriesController extends Controller {
    protected $categoriesService;

    public function __construct(CategoriesService $categoriesService) {
        $this->categoriesService = $categoriesService;
    }

    public function index()
    { 
        $categories = $this->categoriesService->getPaginatedCategories();
        return view('pages.admin.produk.kategori', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $this->categoriesService->storeCategory($request->all());
            return redirect()->back()->with('success', 'Data Kategori berhasil ditambahkan!');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $this->categoriesService->updateCategory($id, $request->all());
            return redirect()->back()->with('success', 'Data Kategori berhasil diperbarui!');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $this->categoriesService->deleteCategory($id);
            return redirect()->back()->with('success', 'Data Kategori berhasil dihapus!');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }
}