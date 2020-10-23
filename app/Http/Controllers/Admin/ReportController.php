<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\CareTaker;
use App\Report;
use Hash;
use Illuminate\Foundation\Console\Presets\React;
use Session;
use Symfony\Component\Finder\Iterator\PathFilterIterator;

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
        $report = Report::get();
        return view('admin.report.list', compact('report'));
    }


    public function addEdit(Request $request, $id = null)
    {
        $report = Report::find($id);
        return view('admin.report.addEdit', compact('report'));
    }
}
