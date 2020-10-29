<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Order;
use App\Product;
use Hash;

class OrderController extends Controller
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

    public function show()
    {
        $orders = Order::where('user_id', Auth::guard('user')->user()->id)->get();
        return view('user.orders', compact('orders'));
    }

    public function order(Request $request)
    {
        // return $request;
        $data['user_id'] = Auth::guard('user')->user()->id;
        $data['product_id'] = $request->id;
        $data['price'] = Product::select('price')->where('id', $request->id)->pluck('price')->first();
        $data['date_from'] = @$request['start-date'] . ' to ' . @$request['end-date'];
        // return $data;
        $care = Order::add($data);
        if ($care) {
            $message = 'Order placed successfully.';
            return redirect('/')->with(['success' => $message]);
        } else {
            $message = 'Error. Please Try Again';
            return redirect()->back()->with(['error' => $message]);
        }
    }

    public function addEdit(Request $request, $id = null)
    {
        $method = $request->method();
        if ($method == 'GET') {
            $patient = [];
            $report = Report::find($id);
            if ($patient) {
                $label = 'Edit Report';
            } else {
                $label = 'Add Report';
            }
            return view('user.addEditReport', compact('report', 'label'));
        } else if ($method == 'POST') {
            $input = $request->all();
            $input['patinet_id'] = Auth::guard('user')->user()->id;
            $save = Report::addEdit($input);
            if ($save) {
                $message = 'Report added successfully.';
                return redirect('reports')->with(['success' => $message]);
            } else {
                $message = 'Error. Please Try Again';
                return redirect()->back()->with(['error' => $message]);
            }
        }
    }
}
