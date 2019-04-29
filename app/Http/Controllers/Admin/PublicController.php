<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    //background login method.  background as bg
    public function login()
    {
        // 展示视图 /resource/views/admin下的login.blade.php
        return view('admin.login');
    }

    // bg verify func
    public function check(Request $request)
    {

        // Start automatic validation
        $this->validate($request,[
            // validation rules fields like this. => 'rule1|rule2:20...'
            'username'      => 'required|min:2|max:20',
            'password'      => 'required|min:6',
            'captcha'       => 'required|size:5|captcha',
        ]);

        // Identity authentication
        $data = $request->only(['username', 'password']);
        $data['status'] = '2'; // user status equals 2 is available
        $remember = $request->input('online')?1:0;
        $res = Auth::guard('admin')->attempt($data);
        if($res){
            // redirect to background page
            return redirect(url('admin/index/index'));
        }else{
            // redirect to login page
            return redirect('admin/login')->withErrors([
                'loginError' => 'ERROR Incorrect username or password',
            ]);
        }
    }

    // user logout
    public function logout()
    {
        // logout
        Auth::guard('admin')->logout();

        // redirect to bg login page
        return redirect(url('/admin/login'));
    }




}
