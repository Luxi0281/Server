<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


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

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }

    public function addAdmins()
    {
		$names = array("Max Luxi", "Nashron");
		
		for ($i = 0; $i < 2; $i++)
		{
			User::create([
                'name' => $names[$i],
                'email' => 'admin'.$i.'@gmail.com',
                'password' => bcrypt('admin', ['password']),
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
    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $usersQuantity = DB::table('users')->count();
        if ($usersQuantity == 0)
        {
            DB::table('users') -> truncate();
            $this->addAdmins();
        }
        $this->middleware('guest')->except('logout');
    }
}