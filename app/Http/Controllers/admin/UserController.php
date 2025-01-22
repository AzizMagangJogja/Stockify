<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\Admin\UserService;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function index() {
        $data = $this->userService->getPaginatedUser();
        $users = $data['users'];
        $role = $data['role'];

        return view('pages.admin.pengguna', compact('users', 'role'));
    }

    public function store(Request $request) {
        try {
            $this->userService->storeUser($request->all());
            return redirect()->back()->with('success', 'Data Pengguna berhasil ditambahkan!');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }

    public function update(Request $request, $id) {
        try {
            $this->userService->updateUser($id, $request->all());
            return redirect()->back()->with('success', 'Data Pengguna berhasil diupdate!');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: !' . $error->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $this->userService->deleteUser($id);
            return redirect()->back()->with('success', 'Data Pengguna berhasil dihapus!');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $error->getMessage());
        }
    }
}