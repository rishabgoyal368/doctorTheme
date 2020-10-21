<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Patient;
use Hash;

class IndexController extends Controller
{

    public function home()
    {
        return view('user.index');
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
            return view('user.login');
        } else if ($method == 'POST') {
            // return 'else';
            $rd = $request->all();
            $rd['email'] = strtolower($request->input('email'));
            $request->replace($rd);
            $input = $request->all();
            $validator = $this->validator($input);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            } else {
                if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
                    return redirect('/')->with(['success' => 'Login successfull']);
                } else {
                    $message = 'Invalid Login.';
                    return redirect()->back()->with(['error' => $message]);
                }
            }
        }
    }

    public function register(Request $request)
    {
        $method = $request->method();
        if ($method == 'GET') {
            return view('user.login');
        } else if ($method == 'POST') {
            // return 'else';
            $input = $request->all();
            $input['profile_image'] = 'images/profile/small/pic1.jpg';
            $input['password'] = bcrypt($request->password);
            $input['gender'] = 'male';
            $save = Patient::addEdit($input);
            if ($save) {
                $message = 'Patient added successfully.';
                return redirect('/')->with(['success' => $message]);
            } else {
                $message = 'Error. Please Try Again';
                return redirect()->back()->with(['error' => $message]);
            }
        }
    }
}
