<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
Use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Config;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:student')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }


    public function showStudentLoginForm()
    {
        return view('auth.login', ['url' => 'student']);
    }


    protected function validator(Request $request)
    {
        return $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
    }

    protected function guardLogin(Request $request, $guard)
    {
        $this->validator($request);

        return Auth::guard($guard)->attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ],
            $request->get('remember')
        );
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/dashboard');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function studentLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/student');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    // protected function authenticated(Request $request, $user)
    // {
    //     if ($user->hasRole('admin')) {
    //         return redirect()->route('admin');
    //     }
    //     if ($user->hasRole('dosen')) {
    //         return redirect()->route('admin');
    //     }

    //     if ($user->hasRole('validator')) {
    //         return redirect()->route('admin');
    //     }
    // }

}
