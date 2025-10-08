<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/'; // This will be ignored if authenticated() is used

    public function __construct()
    {
     $this->middleware('guest')->except('logout');
    }

    // 👇 Add this method below constructor
    protected function authenticated(Request $request, $user)
    {
        if ($user->Utype === 'ADM') {
            return redirect()->route('admin.index');

        } elseif ($user->Utype === 'EMP') {

            return redirect()->route('emp_index');
        } else {

            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Unauthorized user type.'
            ]);
        }
    }
}
