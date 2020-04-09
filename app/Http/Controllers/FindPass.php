<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ShopModel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Model\Findpass as ps;

class FindPass extends Controller
{
    //展示找回密码
    public function findpass()
    {
        return view('pass.findpass');
    }

    //发送邮件
    public function doFindpass(Request $request)
    {
        $post=$request->except('_token');
        $user=ShopModel::where('name','=',$post)
                        ->orwhere('email','=',$post)
                        ->orwhere('mibble','=',$post)
                        ->first();
        if(empty($user)){
            echo "没有查到此用户";die;
        }else{
            $token=Str::random(32);

            $data=[
                'token'=>$token,
                'expire'=>time() + 3000,
                'id'=>$user['id'],
                'status'=>0
            ];
            ps::insertGetId($data);            

            $data=[
                'url'=>env('APP_URL').'pass/newpass?token='.$token
            ];
            Mail::send('pass.email',$data,function($message){
                $post=request()->except('_token');
                $user=ShopModel::where('name','=',$post)
                            ->orwhere('email','=',$post)
                            ->orwhere('mibble','=',$post)
                            ->first();
                $to = [
                    $user['email']
                ];
                $message ->to($to)->subject('密码重置');
            });
            echo "邮件已发送至邮箱：".$user['email'];
        }
    }

    //展示重置密码页面
    public function resPass(Request $Request)
    {
        $gettoken=$Request->get('token');
        // echo $gettoken;
        if(!$gettoken){
            echo "无token";die;
        }
        $token=ps::where('token','=',$gettoken)->orderBy('p_id','desc')->first();
        // echo $token;
        if(!$token){
            echo "token不对";die;
        }

        if($token['status'] = 0){
            echo "token无效";die;
        }

        $status=ps::where('token','=',$gettoken)->update(['status'=>1]);

        session(['id'=>$token['id']]);
        return view('pass.newpass');
    }

    //执行重置密码
    public function doResPass(Request $Request)
    {
        $post=request()->except('_token');
        if($post['pass'] != $post['pass2'] ){
            echo "两次密码不一致";die;
        }
        $pass1=$post['pass'];
        $pass1=password_hash($pass1, PASSWORD_BCRYPT);
        // dd($post);
        $id=session('id');
        unset($post['pass2']);
        $res=ShopModel::where('id','=',$id)->update(['pass'=>$pass1]);
        if($res){
            echo "修改成功！正在跳转至登录页面__________";
            header('refresh:2;url=/login');
        }
    }

}
