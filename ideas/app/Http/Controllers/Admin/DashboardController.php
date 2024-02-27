<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        //gate check
        // if(! Gate::allows('admin')) {
        //     abort(403);
        // }
        // if(Gate::denies('admin')) {
        //     abort(403);
        // }

        //gate check
        // $this->authorize("admin");

        return view("admin.dashboard");
    }
}
