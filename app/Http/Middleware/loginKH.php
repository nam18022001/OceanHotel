<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class loginKH
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {


            # code...
            // return view('view_page.khachhang.index', ['build' => $build]);

        if (Auth::guard('loyal_customer')->check()) {
            # code...
                return $next($request);

        }else{
            return redirect('login')->with('loia', 'Bạn chưa đăng nhập');
        }
    }

}
