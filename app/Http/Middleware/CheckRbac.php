<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class CheckRbac
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        Auth::guard('admin')->user()->role->role_name
//        if(Auth::guard('admin')->user()->role_id != '1'){
        // 开始RBAC的鉴权
        // 获取当前路由 "App\Http\Controllers\Admin\IndexController@index"
        $route = explode("\\", Route::currentRouteAction());
        $url = $route[end($route)];
        dd($route);
        // 获取当前角色已经具备的权限
//        $ac = Auth::guard('admin')->user()->role->role_ac;
//        }

        // 继续后续的请求
        return $next($request);
    }
}
