<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Admin;
use App\CareTaker;
use Hash;

use Session;

class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('admin');
    }


    protected function guard()
    {
        return Auth::guard('admin');
    }


    public function home()
    {
        return view('admin.index');
    }

    public function Validator(array $data, $id)
    {
        // return $id;
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|unique:admins,email,' . $id . ',id,deleted_at,NULL',
            // 'userName' => 'nullable|unique:admins,userName,' . $id . ',_id,deleted_at,NULL',
        ]);
    }


    public function profile(Request $request)
    {
        $method = $request->method();
        if ($method == 'GET') {
            if (Auth::guard('admin')->check()) {
                $user = Auth::guard('admin')->user();
            } else if (Auth::guard('cakerTaker')->check()) {
                $user = Auth::guard('cakerTaker')->user();
            }
            return view('admin.profile',compact('user'));
        } else if ($method == 'POST') {
            $data = $request->all();
            $id =  Auth::guard('admin')->user()->id;
            $validator = $this->validator($data, $id);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            } else {
                $image = '';
                $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();

                if ($request->profile_image) {

                    $uploadedImage = $request->file('profile_image'); //get image
                    $filenameWithExt = $request->file('profile_image')->getClientOriginalName(); //get image name
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); //get image name
                    $image = $imageName = $filename . '_' . time() . '.' . $uploadedImage->getClientOriginalExtension();
                    $destinationPath = public_path('/upload/profile');
                    $uploadedImage->move($destinationPath, $imageName);
                    $admin->profile_image = $image;
                }

                $admin->name = $request->name;
                $admin->email = $request->email;

                if ($admin->save()) {
                    $message = 'Your profile updated successfully.';
                    return redirect('admin/home')->with(['success' => $message]);
                } else {
                    $message = 'Error.';
                    return redirect('admin/profile')->with(['error' => $message]);
                }
            }
        }
    }

    public function changePasword(Request $request)
    {
        $method = $request->method();
        if ($method == 'GET') {
            return view('admin.changePassword');
        } else if ($method == 'POST') {
            $data = $request->all();

            $validator =  Validator::make(
                $data,
                [
                    'password' => 'required|string|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
                ],
                [
                    'password.regex' => 'Passwords must contain 1 UpperCase with Spcial character and Numeric character',
                ]
            );
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            } else {
                $input = $request->all();
                $user = CareTaker::find(Auth::guard('admin')->user()->id);
                if (!Hash::check($input['currentPassword'], $user->password)) {
                    $message = 'Current Passsword is not match';
                    return redirect('employee/change-password')->with(['error' => $message]);
                } else {
                    $user->password = bcrypt($request->password);
                    if ($user->save()) {
                        $message = 'Your password updated successfully.';
                        return redirect('employee/home')->with(['success' => $message]);
                    } else {
                        $message = 'Error. Please Try Again';
                        return redirect('employee/change-password')->with(['error' => $message]);
                    }
                }
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}
