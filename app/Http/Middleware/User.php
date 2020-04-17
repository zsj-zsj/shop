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
        $uid=isset($cookie['uid']) ? $cookie['uid'] : NULL;
        $cotoken=isset($cookie['token']) ? $cookie['token'] : NULL;

        $key='str:user:token'.$uid;
        $token=Redis::get($key);
        $uri=env('PASSPORT').'/login';
        if($token != $cotoken){
            echo "<script>alert('token不对');location.href='$uri';</script>";
        }
        if(!isset($cookie['token'])){
            echo "<script>alert('请先登录');location.href='$uri';</script>";
        }

        return $next($request);
    }
}
