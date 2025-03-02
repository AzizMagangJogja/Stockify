<?php

namespace App\Services\Admin;

use App\Repositories\Admin\CategoriesRepository;
use App\Repositories\UserActivityRepository;
use Illuminate\Support\Facades\Validator;

class CategoriesService {
    protected $categoriesRepository;
    protected $userActivityRepository;

    public function __construct(
        CategoriesRepository $categoriesRepository,
        UserActivityRepository $userActivityRepository,
    ) {
        $this->categoriesRepository = $categoriesRepository;
        $this->userActivityRepository = $userActivityRepository;
    }

    public function getPaginatedCategories($perPage = 20) {
        return $this->categoriesRepository->paginateCategories($perPage);
    }

    public function storeCategory(array $data) {
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            throw new \Exception(implode(', ', $validator->errors()->all()));
        }

        $category = $this->categoriesRepository->createCategory($data);

        $this->userActivityRepository->createActivity([
            'user_id' => auth()->id(),
            'action' => 'Menambah',
            'activity' => 'Produk baru: ' . $category->name
        ]);

        return $category;
    }

    public function updateCategory($id, array $data) {
        $category = $this->categoriesRepository->findCategoryById($id);

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            throw new \Exception(implode(', ', $validator->errors()->all()));
        }

        $oldCategory = clone $category;
        $this->categoriesRepository->updateCategory($category, $data);

        $changes = [];
        if ($oldCategory->name != $data['name']) {
            $changes[] = 'nama dari "' . $oldCategory->name . '" ke "' . $data['name'] . '"';
        }
        if ($oldCategory->description != $data['description']) {
            $changes[] = 'deskripsi dari "' . $oldCategory->description . '" ke "' . $data['description'] . '"';
        }

        $activityDetails = $changes ? implode(', ', $changes) : 'tidak ada perubahan';
        $this->userActivityRepository->createActivity([
            'user_id' => auth()->id(),
            'action' => 'Mengupdate',
            'activity' => 'Kategori: ' . $category->name . ' (' . $activityDetails . ')'
        ]);

        return $category;
    }

    public function deleteCategory($id) {
        $category = $this->categoriesRepository->findCategoryById($id);
        $this->categoriesRepository->deleteCategory($category);

        $this->userActivityRepository->createActivity([
            'user_id' => auth()->id(),
            'action' => 'Menghapus',
            'activity' => 'Kategori: ' . $category->name
        ]);

        return $category;
    }

    public function searchCategory(string $keyword, $perPage = 20) {
        return $this->categoriesRepository->searchCategory($keyword, $perPage);
    }
}