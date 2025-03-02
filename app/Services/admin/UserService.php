<?php

namespace App\Services\Admin;

use App\Repositories\Admin\UserRepository;
use App\Repositories\UserActivityRepository;
use Illuminate\Support\Facades\Validator;

class UserService {
    protected $userRepository;
    protected $userActivityRepository;

    public function __construct(
        UserRepository $userRepository,
        UserActivityRepository $userActivityRepository,
    ) {
        $this->userRepository = $userRepository;
        $this->userActivityRepository = $userActivityRepository;
    }

    public function getPaginatedUser($perPage = 20) {
        $users = $this->userRepository->paginateUser($perPage);
        $role = $users->pluck('role')->filter()->unique();

        return [
            'users' => $users,
            'role' => $role,
        ];
    }

    public function storeUser(array $data) {
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'role' => 'required|string|max:100',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            throw new \Exception(implode(', ', $validator->errors()->all()));
        }

        $user = $this->userRepository->createUser($data);

        $this->userActivityRepository->createActivity([
            'user_id' => auth()->id(),
            'action' => 'Menambah',
            'activity' => 'User baru: ' . $user->name
        ]);

        return $user;
    }

    public function updateUser($id, array $data) {
        $user = $this->userRepository->findUserById($id);
    
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => "required|email|max:255|unique:users,email,$id",
            'role' => 'required|string|max:100',
            'password' => 'nullable|string|min:6'
        ]);
    
        if ($validator->fails()) {
            throw new \Exception(implode(', ', $validator->errors()->all()));
        }
    
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $oldUser = clone $user;
        $this->userRepository->updateUser($user, $data);

        $changes = [];
        if ($oldUser->name != $data['name']) {
            $changes[] = 'nama dari "' . $oldUser->name . '" ke "' . $data['name'] . '"';
        }
        if ($oldUser->email != $data['email']) {
            $changes[] = 'email dari "' . $oldUser->email . '" ke "' . $data['email'] . '"';
        }
        if ($oldUser->role != $data['role']) {
            $changes[] = 'role dari "' . $oldUser->role . '" ke "' . $data['role'] . '"';
        }
        if ($oldUser->password != $data['password']) {
            $changes[] = 'password diperbarui';
        }
    
        $activityDetails = $changes ? implode(', ', $changes) : 'tidak ada perubahan';
        $this->userActivityRepository->createActivity([
            'user_id' => auth()->id(),
            'action' => 'Mengupdate',
            'activity' => 'User: ' . $user->name . ' (' . $activityDetails . ')'
        ]);
    
        return $user;
    }
    
    public function deleteUser($id) {
        $user = $this->userRepository->findUserById($id);
        $this->userRepository->deleteUser($user);

        $this->userActivityRepository->createActivity([
            'user_id' => auth()->id(),
            'action' => 'Menghapus',
            'activity' => 'User: ' . $user->name
        ]);

        return $user;
    }
}