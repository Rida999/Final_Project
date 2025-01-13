<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    //protected $redirectTo = '/home';
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                    'password' => bcrypt(Str::random(16)),
                ]
            );

            Auth::login($user, true);

            return redirect()->intended($this->redirectTo);
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Unable to login with Google.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function handle(Request $request, Closure $next, ...$roles)
{
    // Check if user is authenticated
    if (Auth::check()) {
        $roleId = Auth::user()->role_id;
 
        // Check if user's role ID is in the allowed roles
        if (in_array($roleId, $roles)) {
            // Redirect based on role_id
            switch ($roleId) {
                case 1:
                    return redirect('/menus'); // Page for role_id = 1
                case 2:
                    return redirect('/home'); // Page for role_id = 2
                case 3:
                    return redirect('/restaurants'); // Page for role_id = 3
                default:
                    return redirect('/home'); // Default page for other roles
            }
        }
    }
 
    // Redirect if user doesn't have permission
    return redirect('/home'); // Redirect regular users to home
}



}
