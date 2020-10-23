<?php

namespace App\Http\Controllers\careTaker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\CareTakerRequest;
use App\Report;
use Hash;

class ReportController extends Controller
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
        $user = CareTakerRequest::where(['care_taker_id' => Auth::guard('cakerTaker')->user()->id, 'status' => '1'])->select('user_id')->pluck('user_id')->toArray();
        $report = Report::whereIn('patinet_id', $user)->get();
        return view('admin.report.list', compact('report'));
    }


    public function addEdit(Request $request, $id = null)
    {
        $report = Report::find($id);
        return view('admin.report.addEdit', compact('report'));
    }
}
