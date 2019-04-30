<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Admin\Member;

class MemberController extends Controller
{
    //
    public function index()
    {
        $res = Member::all();
        return view('admin.member.memberList')->with('res', $res);
    }
    public function add(Request $request)
    {
        if($request->isMethod('get')){
            // 查询第一级默认数据 国家
            $country = DB::table('china_area')->where('parent_id', '=', '0')->get();
            return view('admin.member.memberAdd')->with('country', $country);
        }else{
            return '11';
        }
    }

    public function getAreaById(Request $request)
    {
        $id = $request->input('id');
        // select * from area where $id = parent_id
        $res = DB::table('china_area')->where('parent_id', '=', $id)->get(['id', 'name', 'parent_id']);
        return response()->json($res);
    }
}
