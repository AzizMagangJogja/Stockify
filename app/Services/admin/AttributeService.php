<?php

namespace App\Services\Admin;

use App\Repositories\Admin\AttributeRepository;
use App\Repositories\Admin\UserActivityRepository;
use Illuminate\Support\Facades\Validator;

class AttributeService {
    protected $attributeRepository;
    protected $userActivityRepository;

    public function __construct(
        AttributeRepository $attributeRepository,
        UserActivityRepository $userActivityRepository
    ) {
        $this->attributeRepository = $attributeRepository;
        $this->userActivityRepository = $userActivityRepository;
    }

    public function getPaginatedAttribute($perPage = 20) {
        return $this->attributeRepository->paginateAttribute($perPage);
    }

    public function storeAttribute(array $data) {
        $validator = Validator::make($data, [
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
            'value' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            throw new \Exception(implode(', ', $validator->errors()->all()));
        }
        
        $attribute = $this->attributeRepository->createAttribute($data);

        $this->userActivityRepository->createActivity([
            'user_id' => auth()->id(),
            'action' => 'Menambah',
            'activity' => 'Kategori baru: ' . $attribute->name
        ]);

        return $attribute;
    }

    public function updateAttribute($id, array $data) {
        $attribute = $this->attributeRepository->findAttributeById($id);

        $validator = Validator::make($data, [
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
            'value' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            throw new \Exception(implode(', ', $validator->errors()->all()));
        }

        $oldAtribut = clone $attribute;
        $this->attributeRepository->updateAttribute($attribute, $data);

        $changes = [];
        if ($oldAtribut->name != $data['name']) {
            $changes[] = 'atribut dari "' . $oldAtribut->name . '" ke "' . $data['name'] . '"';
        }
        if ($oldAtribut->description != $data['value']) {
            $changes[] = 'deskripsi dari "' . $oldAtribut->value . '" ke "' . $data['value'] . '"';
        }

        $activityDetails = $changes ? implode(', ', $changes) : 'tidak ada perubahan';
        $this->userActivityRepository->createActivity([
            'user_id' => auth()->id(),
            'action' => 'Mengupdate',
            'activity' => 'Atribut: ' . $attribute->name . ' (' . $activityDetails . ')'
        ]);
        
        return $attribute;
    }

    public function deleteAttribute($id) {
        $attribute = $this->attributeRepository->findAttributeById($id);
        $this->attributeRepository->deleteAttribute($attribute);

        $this->userActivityRepository->createActivity([
            'user_id' => auth()->id(),
            'action' => 'Menghapus',
            'activity' => 'Atribut: ' . $attribute->name
        ]);

        return $attribute;
    }
}
