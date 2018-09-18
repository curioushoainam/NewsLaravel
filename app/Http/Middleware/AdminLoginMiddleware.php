<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminLoginMiddleware
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
        if(Auth::check()){
            $user = Auth::user();
            if($user->level == 1)   // check whether user is admin then go ahead; otherwise, go to login page
                return $next($request);    
            else
                return redirect('admin/dangnhap')->with('error','Bạn chưa được cấp quyền');    
        } else {
            return redirect('admin/dangnhap')->with('error','Bạn chưa đăng nhập');
        }

        
    }
}
