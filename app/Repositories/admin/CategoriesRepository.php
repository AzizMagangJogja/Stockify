<?php

namespace App\Repositories\Admin;

use App\Models\Categories;
use App\Models\UserActivity;

class CategoriesRepository {
    public function paginateCategories($perPage = 20) {
        return Categories::paginate($perPage);
    }

    public function createCategory(array $data) {
        return Categories::create($data);
    }

    public function findCategoryById($id) {
        return Categories::findOrFail($id);
    }

    public function updateCategory($category, array $data) {
        return $category->update($data);
    }

    public function deleteCategory($category) {
        return $category->delete();
    }

    public function searchCategory(string $keyword, $perPage = 20) {
        return Categories::where('name', 'LIKE', "%{$keyword}%")
            ->orWhere('description', 'LIKE', "%{$keyword}%")
            ->paginate($perPage);
    }
}

class UserActivityRepository {
    public function createActivity(array $data) {
        return UserActivity::create($data);
    }
}