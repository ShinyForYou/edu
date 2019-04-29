<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    protected $auth;

    public function __construct()
    {
        $this->auth = new Auth;
    }

    //
    public function index()
    {
        /*
        SELECT t1.*, t2.auth_name AS parent_name FROM auth t1
        LEFT JOIN auth t2 ON t1.pid = t2.id
        */
        // admin-permission.html
        $data = DB::select("select t1.*, t2.auth_name as parent_name from auth t1 left join auth t2 on t1.pid = t2.id");
//        $data = DB::table("auth as t1")
//            ->select("t1.*, t2.auth_name as parent_name")
//            ->leftJoin("auth as t2", "t1.pid", "=", "t2.id")
//            ->get();

        return view('admin.auth.authList', compact('data'));
    }

    public function add(Request $request)
    {
        // judge request method
        if ($request->isMethod('get')) {
            $parents = $this->auth::where('pid', '=', '0')->get();
            return view('admin.auth.authAdd', compact('parents'));
        } else {
            // logic handle, then redirect to admin/auth/index
            $data = $request->except('_token');
            foreach ($data as $key => $value) {
                $this->auth->$key = $value;
            }
            $res = $this->auth->save();
            return $res ? '1' : '0';
        }

    }
}
