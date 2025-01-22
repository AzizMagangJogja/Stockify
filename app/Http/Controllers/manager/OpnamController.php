<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Services\Manager\OpnameService;

class OpnamController extends Controller
{
    protected $opnameService;

    public function __construct(OpnameService $opnameService)
    {
        $this->opnameService = $opnameService;
    }

    public function index()
    {
        try {
            $opname = $this->opnameService->getPaginatedOpname();
            return view('pages.manager.stok.opname', compact('opname'));
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat data opname!' . $error->getMessage());
        }
    }
}