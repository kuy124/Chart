<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        $ip = $request->ip();
        $key = $this->throttleKey($request);
        
        if (RateLimiter::tooManyAttempts($key, 5)) {
            return Redirect::back()->withErrors(['error' => 'Terlalu banyak upaya login. Silakan coba lagi nanti.']);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $request->session()->regenerate();

            if (!$user->is_admin) {
                Auth::logout();
                RateLimiter::hit($key);
                return Redirect::back()->withErrors(['error' => 'Anda tidak memiliki akses admin.']);
            }

            RateLimiter::clear($key);
            return Redirect::to('/admin1');
        }

        RateLimiter::hit($key);

        return Redirect::back()->withErrors(['error' => 'Kredensial tidak valid.']);
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    }

    protected function throttleKey(Request $request)
    {
        return Str::lower($request->input('email')).'|'.$request->ip();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Regenerasi ID sesi setelah logout
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
