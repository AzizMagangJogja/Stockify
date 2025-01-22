<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Repositories\AuthRepository;

class AuthService
{
    protected $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login($request)
    {
        $credentials = $request->only(['email', 'password']);

        if (empty($credentials['email']) || empty($credentials['password'])) {
            return false;
        }

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $this->authRepository->logActivity([
                'user_id' => $user->id,
                'action' => 'Login',
                'activity' => 'Login sebagai ' . ucfirst($user->role),
            ]);

            return $this->redirectBasedOnRole($user->role);
        }

        return false;
    }

    public function logout()
    {
        $user = Auth::user();

        $this->authRepository->logActivity([
            'user_id' => $user->id,
            'action' => 'Logout',
            'activity' => 'Melakukan logout',
        ]);

        Auth::logout();
    }

    private function redirectBasedOnRole($role)
    {
        switch ($role) {
            case 'admin':
                return 'admin';
            case 'manager':
                return 'manager';
            case 'staff':
                return 'staff';
            default:
                return false;
        }
    }
}