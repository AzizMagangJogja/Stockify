<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Services\Manager\LapStokService;
use Illuminate\Http\Request;

class LapStokmController extends Controller
{
    protected $lapstokService;

    public function __construct(LapStokService $lapstokService)
    {
        $this->lapstokService = $lapstokService;
    }

    public function index(Request $request)
    {
        try {
            $filters = $request->only(['category_id', 'start_date', 'end_date']);
            $categories = Categories::all();
            $lapstok = $this->lapstokService->getProcessedLapStok($filters);

            return view('pages.manager.laporan.stok', compact('lapstok', 'filters', 'categories'));
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }

    public function exportLapStok(Request $request)
    {
        try {
            $filters = $request->only(['category_id', 'start_date', 'end_date']);

            return $this->lapstokService->exportLapStok($filters);
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengekspor: ' . $error->getMessage());
        }
    }
}