<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Staff\DashboardService;

class DashboardsController extends Controller
{
    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index(Request $request)
    {
        $filters = $request->only(['type', 'start_date', 'end_date']);
        $dashboard = $this->dashboardService->getDashboardData($filters);
        return view('pages.staff.index', compact('dashboard', 'filters'));
    }
}