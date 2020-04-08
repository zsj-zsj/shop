<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ShopModel;
class UserController extends Controller
{

    //登陆的视图
	    function login(){
	    	return view('admin.user.login');
	    }


    //登陆的执行
    	function login_do(){
    		$account=request()->account;
    		$pass=request()->pass;	
    		//$pass=password_hash("123456",PASSWORD_DEFAULT);
    		$res=ShopModel::where(['name'=>$account])->orWhere(['mibble'=>$account])->orWhere(['email'=>$account])->first();
    		//print_r($res);
    		//echo $res['pass'];die;
    		if($res){
    			$result=password_verify($pass,$res['pass']);
    			//echo $result;die;
    			if($result){
					session(['user'=>$res['name']]);
    				echo "<script>alert('登陆成功');location.href='/user/mycenter';</script>";
    			}else{
    				echo "<script>alert('登录失败');location.href='/admin/login';</script>";
    			}
    		}else{
    			echo "<script>alert('账号不存在');location.href='/admin/login';</script>";
    		}
    	
    	}


	//个人中心
      function mycenter(){
      	return view('admin.user.mycenter');
      }

    public function register(){
        return view('admin.user.register');
    }
    public function store(Request $request){
        $post=$request->except('_token');
        if($post['pass'] !=$post['passs']){
            echo "<script>alert('密码不一致');location.href='/register';</script>";
        }
        $post['pass']=password_hash($post['pass'],PASSWORD_BCRYPT);
        unset($post['passs']);
        $res=ShopModel::create($post);
        if($res){
            echo "<script>alert('添加成功');location.href='/admin/login';</script>";
        }
    }

}
