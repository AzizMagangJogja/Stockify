<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserActivity;
use App\Services\Admin\LapAktivitasService;
use Illuminate\Http\Request;

class LapAktivitasController extends Controller
{
    protected $lapaktivitasService;

    public function __construct(LapAktivitasService $lapaktivitasService)
    {
        $this->lapaktivitasService = $lapaktivitasService;
    }

    public function index(Request $request)
    { 
        try {
            $filters = $request->only(['user_id', 'start_date', 'end_date', 'action']);
            $users = User::all();
            $action = UserActivity::select('action')->distinct()->get();
            $useractivity = $this->lapaktivitasService->getPaginatedLapAktivitas($filters);
            
            return view('pages.admin.laporan.activitas', compact('useractivity', 'filters', 'users', 'action'));
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat laporan aktivitas user!' . $error->getMessage());
        }
    }
}