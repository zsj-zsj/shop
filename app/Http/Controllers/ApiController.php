<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ShopModel;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str; 

class ApiController extends Controller
{
    //注册
    public function apiReg(Request $Request)
    {
        $data=$Request->input();
        $res=[
            'name'=>$data['name'],
            'email'=>$data['email'],
            'mibble'=>$data['mibble'],
            'pass'=>$data['pass']=password_hash($data['pass'],PASSWORD_BCRYPT)
        ];
        ShopModel::insertGetId($res);
        $a=[
            'error'=>0,
            'mag'=>'ok',
        ];
        return $a;
    }

    //登录
    public function apiLogin(Request $Request)
    {
        $data=$Request->input();
        $res=ShopModel::where(['name'=>$data['name']])
                        ->orWhere(['mibble'=>$data['name']])
                        ->orWhere(['email'=>$data['name']])->first();
        if($res){
            $pass=password_verify($data['pass'],$res['pass']);
            if($pass){
                $token=Str::random(16);
				$key='str:user:token:app'.$res['id'];
				Redis::set($key,$token);
                Redis::expire($key,3600);
                $a=[
                    'errno'=>0,
                    'msg'=>'ok',
                    'data'=>[
                        'token'=>$token,
                        'id'=>$res['id']
                    ]    
                ];
                return $a;       
            }else{
                echo "密码不对";die;
            }
        }else{
            echo "没有此用户";die;
        }
    }
}
