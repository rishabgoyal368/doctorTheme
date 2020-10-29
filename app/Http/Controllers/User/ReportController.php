<?php

namespace App\Http\Controllers\User;

use App\CareTakerRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Report;
use Hash;

class ReportController extends Controller
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

    public function reports(Request $request)
    {
        $report = Report::where('patinet_id',Auth::guard('user')->user()->id)->get();
        return view('user.report', compact('report'));
    }

    public function addEdit(Request $request, $id = null)
    {
        $method = $request->method();
        if ($method == 'GET') {
            $patient = [];
            $report = Report::where('id',$id)->first();
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

    public function assignCT()
    {
        $report = CareTakerRequest::where('user_id',Auth::guard('user')->user()->id)->get();
        return view('user.care_list', compact('report'));
    }
}
