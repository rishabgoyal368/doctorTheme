<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Order;
use App\Product;
use Hash;
use Illuminate\Foundation\Console\Presets\React;
use Session;
use Symfony\Component\Finder\Iterator\PathFilterIterator;

class ProductController extends Controller
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
        $product = Product::get();
        return view('admin.product.list', compact('product'));
    }


    public function addEdit(Request $request, $id = null)
    {

        $method = $request->method();
        if ($method == 'GET') {
            $product = [];
            $product = Product::find($id);
            if ($product) {
                $label = 'Edit Product';
            } else {
                $label = 'Add Product';
            }
            return view('admin.product.addEdit', compact('product', 'label'));
        } else if ($method == 'POST') {
            $data = $request->all();
            $validator =  Validator::make(
                $data,
                [
                    'name' => 'required|string',
                    'price' => 'required|numeric',
                    'description' => 'required',
                    'status' => 'required',
                    'image' => @$request['id'] ? 'nullable|mimes:jpeg,jpg,png' : 'required|mimes:jpeg,jpg,png,',
                ]
            );
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            } else {
                // return 'else';
                $input = $request->all();
                $patientDetail = Product::find($request->id);
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
                $input['upload_by'] = Auth::guard('admin')->user()->id;
                $save = Product::addEdit($input);
                if ($input['status'] == 'delete') {
                    // Product::where('id', $save['id'])->delete();
                }
                if ($save) {
                    $message = 'Product added successfully.';
                    return redirect('admin/products')->with(['success' => $message]);
                } else {
                    $message = 'Error. Please Try Again';
                    return redirect()->back()->with(['error' => $message]);
                }
            }
        }
    }

    public function order()
    {
        $order = Order::get();
        return view('admin.order',compact('order'));
    }
}
