<?php

namespace App\Http\Controllers\User;

use App\CareTakerRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\UserProduct;
use Hash;

class UserProductController extends Controller
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

    public function show(Request $request)
    {
        $product = UserProduct::where('upload_by', Auth::guard('user')->user()->id)->get();
        return view('user.user_product', compact('product'));
    }

    public function addEdit(Request $request, $id = null)
    {
        $method = $request->method();
        if ($method == 'GET') {
            $patient = [];
            $product = UserProduct::where('id', $id)->first();
            if ($patient) {
                $label = 'Edit Report';
            } else {
                $label = 'Add Report';
            }
            return view('user.addEditProduct', compact('product', 'label'));
        } else if ($method == 'POST') {
            $data = $request->all();
            $validator =  Validator::make(
                $data,
                [
                    'name' => 'required|string',
                    'price' => 'required|numeric',
                    'description' => 'required',
                    'image' => @$request['id'] ? 'nullable|mimes:jpeg,jpg,png' : 'required|mimes:jpeg,jpg,png,',
                ]
            );
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            $input = $request->all();
            $patientDetail = UserProduct::find($request->id);
            if ($request->image) {
                $uploadedImage = $request->file('image'); //get image
                $filenameWithExt = $request->file('image')->getClientOriginalName(); //get image name
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); //get image name
                $input['image'] = $imageName = $filename . '_' . time() . '.' . $uploadedImage->getClientOriginalExtension();
                $destinationPath = public_path('/upload/product');
                $uploadedImage->move($destinationPath, $imageName);
            } else {
                $input['image'] = @$patientDetail['image'];
            }
            $input['status'] = 'false';
            $input['upload_by'] = Auth::guard('user')->user()->id;
        //    return $input
            $save = UserProduct::addEdit($input);
            if ($save) {
                $message = 'Request added successfully.';
                return redirect('user-products')->with(['success' => $message]);
            } else {
                $message = 'Error. Please Try Again';
                return redirect()->back()->with(['error' => $message]);
            }
        }
    }

    public function assignCT()
    {
        $report = CareTakerRequest::where('user_id', Auth::guard('user')->user()->id)->get();
        return view('user.care_list', compact('report'));
    }
}
