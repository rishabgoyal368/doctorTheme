<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Patient;
use Hash;

use Session;
use Symfony\Component\Finder\Iterator\PathFilterIterator;

class PatientController extends Controller
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


    public function show()
    {
        $patient = Patient::get();
        return view('admin.patient.list', compact('patient'));
    }


    public function addEdit(Request $request, $id = null)
    {
        $method = $request->method();
        if ($method == 'GET') {
            $patient = [];
            $patient = Patient::find($id);
            if ($patient) {
                $label = 'Edit Patient';
            } else {
                $label = 'Add Patient';
            }
            return view('admin.patient.addEdit', compact('patient', 'label'));
        } else if ($method == 'POST') {
            $data = $request->all();
            $validator =  Validator::make(
                $data,
                [
                    'name' => 'required|string',
                    'email' => 'required|email',
                    'gender' => 'required',
                    'mobile' => 'required|numeric',
                    'profile_image' => @$request['id'] ? 'nullable|mimes:jpeg,jpg,png' : 'nullable|mimes:jpeg,jpg,png,',
                    'password' => @$request['id'] ? 'nullable' : 'required|string|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
                ],
                [
                    'password.regex' => 'Passwords must contain 1 UpperCase with Spcial character and Numeric character',
                ]
            );
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            } else {
                // return 'else';
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
                if (!$request->password) {
                    // return $patientDetail;
                    $input['password'] = @$patientDetail['password'];
                } else {
                    $input['password'] =  bcrypt($request['password']);
                }
                // return $input;
                $save = Patient::addEdit($input);
                if ($save) {
                    $message = 'Patient added successfully.';
                    return redirect('admin/patients')->with(['success' => $message]);
                } else {
                    $message = 'Error. Please Try Again';
                    return redirect()->back()->with(['error' => $message]);
                }
            }
        }
    }
}
