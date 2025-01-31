<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\OpnameService;

class OpnameController extends Controller
{
    protected $opnameService;

    public function __construct(OpnameService $opnameService)
    {
        $this->opnameService = $opnameService;
    }

    public function index(Request $request)
    { 
        try {
            $keyword = $request->get('search');
            $opname = $keyword 
                ? $this->opnameService->searchOpname($keyword) 
                : $this->opnameService->getPaginatedOpname();
            return view('pages.admin.stok.opname', compact('opname'));
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }
}