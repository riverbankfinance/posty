<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

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
    public function __construct()
    {
        $this->middleware(['guest']);
    }


    public function index()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
            //validation
            $this->validate($request,[
                'email'=>'required|email',
                'password'=>'required',
            ]);

            $credentials = $request->only(['email', 'password']);

            if(!Auth::attempt($credentials, $request->remember))
            {
                return back()->with('status', 'Invalid Login Details.');
            }

        return redirect()->route('dashboard');
    }



//     use AuthenticatesUsers;

//     /**
//      * Where to redirect users after login.
//      *
//      * @var string
//      */
//     protected $redirectTo = RouteServiceProvider::HOME;

//     /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
// //     public function __construct()
// //     {
// //         $this->middleware('guest')->except('logout');
// //     }
// //
}
