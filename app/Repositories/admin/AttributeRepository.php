<?php

namespace App\Repositories\Admin;

use App\Models\ProductAttributes;

class AttributeRepository {
    public function paginateAttribute($perPage = 20) {
        return ProductAttributes::with(['product'])->paginate($perPage);
    }

    public function createAttribute(array $data) {
        return ProductAttributes::create($data);
    }

    public function findAttributeById($id) {
        return ProductAttributes::findOrFail($id);
    }

    public function updateAttribute($attribute, array $data) {
        return $attribute->update($data);
    }

    public function deleteAttribute($attribute) {
        return $attribute->delete();
    }

    public function searchAttribute(string $keyword, $perPage = 20) {
        return ProductAttributes::with(['product'])->where('name', 'LIKE', "%{$keyword}%")
            ->orWhere('value', 'LIKE', "%{$keyword}%")
            ->orWhereHas('product', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%");
            })
            ->paginate($perPage);
    }
}