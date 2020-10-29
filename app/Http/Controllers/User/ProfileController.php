<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Patient;
use Hash;

class ProfileController extends Controller
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

    public function account(Request $request)
    {
        $method = $request->method();
        if ($method == 'GET') {
            $patient = Auth::guard('user')->user();
            return view('user.account',compact('patient'));
        } else if ($method == 'POST') {
            $input = $request->all();
            $patientDetail = Patient::find($request->id);
            if ($request->profile_image) {
                $uploadedImage = $request->file('profile_image'); //get image
                $filenameWithExt = $request->file('profile_image')->getClientOriginalName(); //get image name
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); //get image name
                $input['profile_image'] = $imageName = $filename . '_' . time() . '.' . $uploadedImage->getClientOriginalExtension();
                $destinationPath = public_path('/upload/profile');
                $uploadedImage->move($destinationPath, $imageName);
            } else {
                $input['profile_image'] = @$patientDetail['profile_image'];
            }
            if ($request->report_file) {
                $uploadedImage = $request->file('report_file'); //get image
                $filenameWithExt = $request->file('report_file')->getClientOriginalName(); //get image name
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); //get image name
                $input['report_file'] = $imageName = $filename . '_' . time() . '.' . $uploadedImage->getClientOriginalExtension();
                $destinationPath = public_path('/upload/profile');
                $uploadedImage->move($destinationPath, $imageName);
            } else {
                $input['report_file'] = @$patientDetail['report_file'];
            }
            if (!$request->password) {
                // return $patientDetail;
                $input['password'] = @$patientDetail['password'];
            } else {
                $input['password'] =  bcrypt($request['password']);
            }
            if($request->dob)
            {
                $dob = $request->dob;
                $input['age'] =  \Carbon\Carbon::parse($dob)->age;
            }
            // return $input;
            $save = Patient::addEdit($input);
            if ($save) {
                $message = 'Profile updated successfully.';
                return redirect('/')->with(['success' => $message]);
            } else {
                $message = 'Error. Please Try Again';
                return redirect()->back()->with(['error' => $message]);
            }
        }
    }
}
