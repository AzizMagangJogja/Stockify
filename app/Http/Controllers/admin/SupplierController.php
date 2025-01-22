<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\SupplierService;

class SupplierController extends Controller
{
    protected $supplierService;

    public function __construct(SupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    public function index()
    { 
        $supplier = $this->supplierService->getPaginatedSupplier();
        return view('pages.admin.supplier', compact('supplier'));
    }

    public function store(Request $request)
    {
        try {
            $this->supplierService->storeSupplier($request->all());
            return redirect()->back()->with('success', 'Data Supplier berhasil ditambahkan!');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $this->supplierService->updateSupplier($id, $request->all());
            return redirect()->back()->with('success', 'Data Supplier berhasil diupdate!');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $this->supplierService->deleteSupplier($id);
            return redirect()->back()->with('success', 'Data Supplier berhasil dihapus!');
     } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }
}
