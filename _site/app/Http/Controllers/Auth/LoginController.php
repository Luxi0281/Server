<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function addUser()
    {
        $usersQuantity = DB::table('users')->count();

        if ($usersQuantity == 0) {
            DB::table('users') -> truncate();
            return User::create([
                'name' => 'Max Luxi',
                'email' => 'myemail@gmail.com',
                'password' => bcrypt('admin', ['password']),
                'isAdmin' => true,
                'remember_token' => str_random(10)
            ]);

        }
    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->addUser();
        $this->middleware('guest')->except('logout');
    }
}