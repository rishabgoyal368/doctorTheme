<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Admin;
use Session;

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
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $data = Admin::get();
        return view('Admin.auth.login')->with(['data' => $data]);
    }

    public function showForgetLoginForm()
    {
        $data = Admin::get();
        return view('Admin.auth.forget')->with(['data' => $data]);
    }


    public function logout(Request $request)
    {

        Auth::guard('admin')->logout();

        return redirect('admin/');
    }


    protected function guard()
    {
        return Auth::guard('admin');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }

    public function login(Request $request)
    {
        $method = $request->method();
        if ($method == 'GET') {
            // Admin::create([
            //     // 'name' => 'rishab',
                // // 'email' => 'rishab@test.com',
                // // 'password' => bcrypt('12345'),
            //     // 'profile_image' => '-',
            // ]);
            return view('admin.login');
        } else if ($method == 'POST') {
            $rd = $request->all();
            $rd['email'] = strtolower($request->input('email'));
            $request->replace($rd);
            $input = $request->all();
            $validator = $this->validator($input);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            } else {
                if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                    return redirect('/admin/home');
                } else {
                    $message = 'Invalid Login.';
                    return redirect()->back()->with(['error' => $message]);
                }
            }
        }
    }
}
