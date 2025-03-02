<?php

namespace App\Repositories\Admin;

use App\Models\User;

class UserRepository {
    public function paginateUser($perPage = 20) {
        return User::paginate($perPage);
    }

    public function createUser(array $data) {
        return User::create($data);
    }

    public function findUserById($id) {
        return User::findOrFail($id);
    }

    public function updateUser($user, array $data) {
        return $user->update($data);
    }

    public function deleteUser($user) {
        return $user->delete();
    }
}