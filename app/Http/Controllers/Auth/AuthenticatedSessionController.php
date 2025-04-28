<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {

        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     $user = $request->user();

    //     // Update the last_login_at timestamp
    //     $user->update(['last_login_at' => now()]);

    //     if ($user->isAdmin()) {
    //         return redirect('/admin/dashboard');
    //     } elseif ($user->isInstructor()) {
    //         return redirect('/instructor/dashboard');
    //     } else {
    //         return redirect('/user/dashboard');
    //     }

    //     // return redirect()->intended(route('dashboard', absolute: false));
    // }

    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            $request->authenticate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withInput($request->only('email'))
                ->with('error', 'Invalid email or password.');
        }

        $request->session()->regenerate();

        $user = $request->user();

        // Update the last_login_at timestamp
        $user->update(['last_login_at' => now()]);

        if ($user->isAdmin()) {
            return redirect('/admin/dashboard');
        } elseif ($user->isInstructor()) {
            return redirect('/instructor/dashboard');
        } else {
            return redirect('/user/dashboard');
        }
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
