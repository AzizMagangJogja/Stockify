<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Services\Manager\SupplierService;

class SuppliermController extends Controller
{
    protected $supplierService;

    public function __construct(SupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    public function index()
    { 
        try {
            $supplier = $this->supplierService->getPaginatedSupplier();
            return view('pages.manager.supplier', compact('supplier'));
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat data suplier!' . $error->getMessage());
        }
    }
}