<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\MinimumService;

class MinimumController extends Controller
{
    protected $minimumService;

    public function __construct(MinimumService $minimumService)
    {
        $this->minimumService = $minimumService;
    }

    public function index(Request $request)
    { 
        $keyword = $request->get('search');
        $minimum = $keyword 
            ? $this->minimumService->searchMinimum($keyword) 
            : $this->minimumService->getPaginatedMinimum();
        return view('pages.admin.stok.minimum', compact('minimum'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->minimumService->updateMinimum($id, $request->all());
            return redirect()->back()->with('success', 'Stok minimum berhasil diupdate!');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }
}