<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra nếu người dùng đã đăng nhập và role là 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);  // Cho phép truy cập nếu người dùng là admin
        }

        // Nếu không phải là admin, chuyển hướng hoặc trả về lỗi
        return redirect('/')->with('error', 'Bạn không có quyền truy cập vào trang này.');
    }
}
