<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Patient;
use App\CareTaker;
use App\Product;
use Hash;

class IndexController extends Controller
{

    public function home()
    {
        $careTaker = CareTaker::take(3)->get();
        $product = Product::take(3)->get();
        return view('user.index',compact('careTaker','product'));
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

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect('/');
    }

    public function product()
    {
         $product = Product::where('status','active')->get();
         return view('user.products',compact('product'));
    }
}
