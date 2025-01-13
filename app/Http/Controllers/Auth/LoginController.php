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

    public function authenticated(Request $request, $user)
{
    if ($user->role->name === 'admin') {
        return redirect()->route('dashboard');
    } elseif ($user->role->name === 'restaurant_owner') {
        return redirect()->route('restaurants.index'); // Update as per your routes
    } elseif ($user->role->name === 'user') {
        return redirect('/'); // Or wherever the default user should go
    }

    return redirect('/'); // Default fallback
}

}
