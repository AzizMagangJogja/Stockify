<?php

namespace App\Services\Staff;

use App\Repositories\Staff\DashboardRepository;

class DashboardService
{
    protected $dashboardRepository;

    public function __construct(DashboardRepository $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
    }

    public function getDashboardData($filters = [], $perPage = 20)
    {
        return $this->dashboardRepository->paginateDashboard($filters, $perPage);
    }
}
