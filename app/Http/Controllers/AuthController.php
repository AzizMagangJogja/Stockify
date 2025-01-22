<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function index()
    {
        return view('pages.autentikasi.sign-in');
    }

    public function login(Request $request)
    {
        $redirectRole = $this->authService->login($request);

        if ($redirectRole) {
            return redirect($redirectRole);
        }
        
        return redirect()->back()->withErrors('Username dan password yang dimasukkan tidak sesuai!')->withInput();
    }

    public function logout()
    {
        $this->authService->logout();
        return redirect('');
    }
}