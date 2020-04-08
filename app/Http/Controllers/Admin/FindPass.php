<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ShopModel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Model\Findpass as ps;
class FindPass extends Controller
{
    public function findpass()
    {
        return view('admin.user.findpass');
    }

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
                'expire'=>time() + 60,
                'id'=>$user['id'],
                'status'=>0
            ];
            ps::insertGetId($data);            

            $data=[
                'url'=>env('APP_URL').'pass/newPass'
            ];
            Mail::send('admin.user.newpass',$data,function($message){
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
            echo "";
        }
    }
}
