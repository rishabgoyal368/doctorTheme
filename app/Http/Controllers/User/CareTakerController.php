<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Patient;
use App\CareTaker;
use App\CareTakerRequest;
use Hash;

class CareTakerController extends Controller
{

    public function show()
    {
        $careTaker = CareTaker::where('type','2')->get();
        return view('user.careTaker', compact('careTaker'));
    }

    public function book($id)
    {
        $data['user_id'] = Auth::guard('user')->user()->id;
        $data['care_taker_id'] = $id;
        $data['status'] = 0;
        $sent =  (int) CareTakerRequest::where(['user_id' => $data['user_id'], 'care_taker_id' => $id])->count();
        if ($sent == 0) {
            $care = CareTakerRequest::add($data);
            if ($care) {
                $message = 'Request added successfully.';
                return redirect('/')->with(['success' => $message]);
            } else {
                $message = 'Error. Please Try Again';
                return redirect()->back()->with(['error' => $message]);
            }
        }
        $message = 'Already request sent';
        return redirect()->back()->with(['error' => $message]);
    }
}
