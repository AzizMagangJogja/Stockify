<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Imports\ProductsImport;
use App\Http\Controllers\Controller;
use App\Services\Admin\ImportService;

class ImportController extends Controller
{
    protected $importService;

    public function __construct(ImportService $importService)
    {
        $this->importService = $importService;
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        try {
            $file = $request->file('file');
            $this->importService->importProduct($file, new ProductsImport);

            return redirect()->back()->with('success', 'Data produk berhasil diimpor!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengimpor data produk: ' . $e->getMessage());
        }
    }
}