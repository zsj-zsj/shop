<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Model\Github;
use App\Model\ShopModel;
use Illuminate\Support\Facades\Cookie; 
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Redis;

class GithubLogin extends Controller
{
    public function gitlogin(Request $request){
        $code=$_GET['code'];
        // post  获取token
        $url="https://github.com/login/oauth/access_token";
        $client= new client();
        $response=$client->request('POST',$url,[
            'headers'=>[
                'Accept'=>'application/json'
            ],
            'form_params'=>[
                'client_id'=>env('client_id'),
                'client_secret'=>env('client_secret'),
                'code'=>$code,
            ]
        ]);
        $json=$response->getBody();
        $access_token=json_decode($json,true);
        //用户信息
        $urls="https://api.github.com/user";
        $response2=$client->request('GET',$urls,[
            'headers'=>[
                'Authorization'=>'token '.$access_token['access_token']
            ],   
        ]);
        $json=$response2->getBody();
        $user=json_decode($json,true);

        //根据 git用户id 判断登陆过没有
        $id=Github::where('git_id','=',$user['id'])->first();
        if($id){
            $gitid=$id->id;
        }else{
            //git用户名入到用户表
            $data=[
                'name'=>$user['login']
            ];
            $git=ShopModel::insertGetId($data);
            //把user id 入到git 表
            $gituser=[
                'id'=>$git,
                'git_id'=>$user['id'],
                'git_name'=>$user['login']
            ];
            Github::create($gituser);
        }

        $token=Str::random(16);
        setcookie('token',$token,time() + 3600,'/','.1906.com',NULL,true);
        $user_id=ShopModel::where('id','=',$id['id'])->first();
        $key='str:user:token'.$user_id['id'];
        Redis::set($key,$token);
        Redis::expire($key,3600);
        
        header("refresh:0,url='http://shop.1906.com/'");
        echo "登录成功，正在跳转____";
    }
}
