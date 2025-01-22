<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\LapTransService;
use Illuminate\Http\Request;
use App\Models\Categories;

class LapTransController extends Controller
{
    protected $laptransService;

    public function __construct(LapTransService $laptransService)
    {
        $this->laptransService = $laptransService;
    }

    public function index(Request $request)
    {
        try {
            $filters = $request->only(['type', 'status', 'start_date', 'end_date', 'category_id']);
            $categories = Categories::all();
            $laptrans = $this->laptransService->getPaginatedLapTrans($filters);
            
            return view('pages.admin.laporan.transaksi', compact('filters', 'laptrans', 'categories'));
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }
}