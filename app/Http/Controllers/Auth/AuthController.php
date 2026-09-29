<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function showLogin(): View|RedirectResponse
    {
        if (Auth::check()) {
            return $this->redirectUser(Auth::user());
        }
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $login = trim($credentials['login']);
        $password = $credentials['password'];
        $user = null;

        // 1. Check if login matches a Member ID (e.g. CEC-2026-0001)
        $member = \App\Models\Member::where('member_id', $login)
            ->orWhere('member_id', strtoupper($login))
            ->first();

        if ($member && $member->user) {
            $user = $member->user;
        }

        // 2. Check if login matches Email
        if (!$user && filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $user = \App\Models\User::where('email', $login)->first();
        }

        // 3. Check if login matches Phone / Mobile number (flexible formats)
        if (!$user) {
            $digitsOnly = preg_replace('/[^0-9]/', '', $login);
            if (strlen($digitsOnly) >= 7) {
                $coreDigits = substr($digitsOnly, -10);

                $user = \App\Models\User::where('phone', $login)
                    ->orWhereRaw("REPLACE(REPLACE(phone, ' ', ''), '-', '') LIKE ?", ['%' . $coreDigits])
                    ->first();

                // If not found in users table phone, also check members table mobile & whatsapp
                if (!$user) {
                    $memberByPhone = \App\Models\Member::where('mobile', $login)
                        ->orWhere('whatsapp_number', $login)
                        ->orWhereRaw("REPLACE(REPLACE(mobile, ' ', ''), '-', '') LIKE ?", ['%' . $coreDigits])
                        ->orWhereRaw("REPLACE(REPLACE(whatsapp_number, ' ', ''), '-', '') LIKE ?", ['%' . $coreDigits])
                        ->first();

                    if ($memberByPhone && $memberByPhone->user) {
                        $user = $memberByPhone->user;
                    }
                }
            }
        }

        // Validate password and authenticate
        if ($user && \Illuminate\Support\Facades\Hash::check($password, $user->password)) {
            Auth::login($user, $request->boolean('remember'));
            $request->session()->regenerate();

            if ($user->status !== 'active') {
                Auth::logout();
                return back()->with('error', 'Your account has been deactivated. Please contact the club administrator.');
            }

            return $this->redirectUser($user);
        }

        return back()->withInput($request->only('login', 'remember'))
            ->with('error', 'The provided credentials do not match our records. Please check your Member ID, Mobile, or Email and Password.');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'You have been logged out successfully.');
    }

    protected function redirectUser($user): RedirectResponse
    {
        if ($user->isAdmin()) {
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->intended(route('member.dashboard'));
    }
}
