<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Role;
use Illuminate\Http\Response;


class RoleController extends Controller
{
    protected $role;

    public function __construct()
    {
        $this->role = new Role;
    }
    //
    public function index()
    {
        $res = Role::all();
        // admin-role.html
        return view('admin.role.roleList')->with('res', $res);
        // return response()->json(['code' =>'200' ,'res' => $res]);
    }

    public function add()
    {
        return view('admin.role.roleAdd');
    }
}
