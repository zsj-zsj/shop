<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redis;

class User
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
        $cookie=$_COOKIE;
        $key='str:user:token'.isset($cookie['uid']);
        $token=Redis::get($key);
        if($token != isset($cookie['token'])){
            echo "<script>alert('token无效');location.href='/login';</script>";
        }
        if(!isset($cookie['token'])){
            echo "<script>alert('请登录');location.href='/login';</script>";
        }

        return $next($request);
    }
}
