<?php

namespace App\Services\Admin;

use App\Repositories\Admin\MinimumRepository;
use App\Repositories\UserActivityRepository;
use Illuminate\Support\Facades\Validator;

class MinimumService {
    protected $minimumRepository;
    protected $userActivityRepository;

    public function __construct(
        MinimumRepository $minimumRepository,
        UserActivityRepository $userActivityRepository
    ) {
        $this->minimumRepository = $minimumRepository;
        $this->userActivityRepository = $userActivityRepository;
    }

    public function getPaginatedMinimum($perPage = 20) {
        return $this->minimumRepository->paginateMinimum($perPage);
    }

    public function updateMinimum($id, array $data) {
        $minimum = $this->minimumRepository->findMinimumById($id);

        $validator = Validator::make($data, [
            'minimum_stock' => 'required|integer|min:0'
        ]);

        if ($validator->fails()) {
            throw new \Exception(implode(', ', $validator->errors()->all()));
        }

        $oldMinimum = clone $minimum;
        $this->minimumRepository->updateMinimum($minimum, $data);

        $changes = [];
        if ($oldMinimum->minimum_stock != $data['minimum_stock']) {
            $changes[] = 'stok minimum dari "' . $oldMinimum->minimum_stock . '" ke "' . $data['minimum_stock'] . '"';
        }
        return $minimum;
    }

    public function searchMinimum(string $keyword, $perPage = 20) {
        return $this->minimumRepository->searchMinimum($keyword, $perPage);
    }
}
