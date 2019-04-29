<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Manager;

class ManagerController extends Controller
{
    // admin list display
    public function index()
    {
        $data = Manager::where('id','<','50')->get();
        return view('admin.manager.managerList', compact('data'));
    }
}
