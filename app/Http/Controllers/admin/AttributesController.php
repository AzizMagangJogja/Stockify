<?php

namespace App\Http\Controllers\Admin;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\AttributeService;

class AttributesController extends Controller
{
    protected $attributeService;

    public function __construct(AttributeService $productService)
    {
        $this->attributeService = $productService;
    }

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $attribute = $keyword 
            ? $this->attributeService->searchAttribute($keyword) 
            : $this->attributeService->getPaginatedAttribute();
        $product = Products::all();
    
        return view('pages.admin.produk.attribut', compact('attribute', 'product'));
    }

    public function store(Request $request)
    {
        try {
            $this->attributeService->storeAttribute($request->all());
            return redirect()->back()->with('success', 'Data Atribut berhasil ditambahkan!');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $this->attributeService->updateAttribute($id, $request->all());
            return redirect()->back()->with('success', 'Data Atribut berhasil diperbarui!');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $this->attributeService->deleteAttribute($id);
            return  redirect()->back()->with('success', 'Data Atribut berhasil dihapus!');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }
}
