<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use App\Models\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';    
    protected $username = 'username';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function username()
    {
        return 'username';
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $key = Str::lower($request->input($this->username())).'|'.$request->ip();

        RateLimiter::hit($key);

        if (RateLimiter::tooManyAttempts($key, 3)) {
         
            $user = User::where($this->username(), $request->input($this->username()))->first();
            if ($user) {
                $user->is_blocked = 1;
                $user->save();
            }

            return redirect()->route('login')->withErrors(['username' => 'Your account has been blocked due to too many failed login attempts. Please contact admin.']);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => trans('auth.failed'),
            ]);
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->is_blocked == 1) {
            auth()->logout();
            return redirect()->route('login')->withErrors(['username' => 'Your account is blocked.']);
        }
    }
}