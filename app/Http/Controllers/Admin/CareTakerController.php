<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\CareTaker;
use App\CareTakerRequest;
use Hash;

use Session;
use Symfony\Component\Finder\Iterator\PathFilterIterator;

class CareTakerController extends Controller
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
        $patient = CareTaker::get();
        return view('admin.careTaker.list', compact('patient'));
    }


    public function addEdit(Request $request, $id = null)
    {
        $method = $request->method();
        if ($method == 'GET') {
            $patient = [];
            $patient = CareTaker::find($id);
            if ($patient) {
                $label = 'Edit Employee';
            } else {
                $label = 'Add Employee';
            }
            return view('admin.careTaker.addEdit', compact('patient', 'label'));
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
                $patientDetail = CareTaker::find($request->id);
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
                $save = CareTaker::addEdit($input);
                if ($save) {
                    $msz = @$request['id'] ? 'updated' : 'added' ;
                    $message = 'Employee '.$msz.' successfully.';
                    // $message = 'Employee added successfully.';
                    return redirect('admin/care-takers')->with(['success' => $message]);
                } else {
                    $message = 'Error. Please Try Again';
                    return redirect()->back()->with(['error' => $message]);
                }
            }
        }
    }

    public function Crequest()
    {
        $request = CareTakerRequest::get();
        return view('admin.careTaker.request', compact('request'));
    }

    public function change(Request $request, $id = null)
    {
        $method = $request->method();
        if ($method == 'GET') {
            $request = CareTakerRequest::find($id);
            return view('admin.careTaker.Changerequest', compact('request'));
        }
        else if ($method == 'POST') {
            $a =  CareTakerRequest::where('id', $request->id)->update([
                'status' => $request->status,
            ]);
            if ($a) {
                $message = 'Request updated successfully.';
                return redirect('admin/care-taker-request')->with(['success' => $message]);
            } else {
                $message = 'Error. Please Try Again';
                return redirect()->back()->with(['error' => $message]);
            }
        }
    }
}
