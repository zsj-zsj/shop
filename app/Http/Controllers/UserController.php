<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ShopModel;
use Illuminate\Support\Facades\Mail;
class UserController extends Controller
{

    //登陆的视图
	public function login()
	{
	    return view('user.login');
	}


    //登陆的执行
	public function login_do()
	{
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

                $data=[
                    'status'=>'登陆成功'
                ];
                Mail::send('user.loginsuccess',$data,function($message) use ($account){
					//$account=request()->account;
					$user=ShopModel::where(['name'=>$account])->orWhere(['mibble'=>$account])->orWhere(['email'=>$account])->first();
					$to = [
						$user['email']
					];
					$message ->to($to)->subject('登陆成功');
            	});
				session(['user'=>$res['name']]);
    			echo "<script>alert('登陆成功');location.href='/user/mycenter';</script>";
               
    		}else{
    			echo "<script>alert('登录失败');location.href='/login';</script>";
			}
		}else{
    		echo "<script>alert('账号不存在');location.href='/login';</script>";
    	}	
    }


	//个人中心
	public function mycenter()
	{
      	return view('user.mycenter');
	}
	
	//注册视图
	public function register()
	{
        return view('user.register');
	}
	
	//执行注册
	public function store(Request $request)
	{
        $post=$request->except('_token');
        $qqmail=$post['email'];
		if(!preg_match('|^[1-9]\d{4,10}@qq\.com$|i',$qqmail)){
		echo $qqmail,' 请输入正确的邮箱格式';die;
		}
        if($post['pass'] !=$post['passs']){
            echo "<script>alert('密码不一致');location.href='/reg';</script>";
		}

		$qqmail=$post['email'];
		if(!preg_match('|^[1-9]\d{4,10}@qq\.com$|i',$qqmail)){
			echo "<script>alert('邮箱格式不对');location.href='/reg';</script>";
		}

        $post['pass']=password_hash($post['pass'],PASSWORD_BCRYPT);
        unset($post['passs']);
        $res=ShopModel::create($post);
        if($res){
			$data=[
			    'user_name' => $post['name'],
				'url' => "注册成功"
			];
			Mail::send('user.regemail',$data,function($message) use($post){
					$to = [
                        $post['email']
					];
					$message ->to($to)->subject('注册成功');
				});
				echo "<script>alert('恭喜用户注册成功,附加邮件请接收');location.href='/login';</script>";
        }
	}
	
	//修改密码
	public function changePass()
	{
		return view('user.changepass');
	}

	//执行修改密码
	public function dochangePass(Request $request)
	{
		$post=$request->except('_token');
		$user=session('user');
		$res=ShopModel::where('name','=',$user)->first()->toArray();
		$result=password_verify($post['pass'],$res['pass']);
		// echo $request;
		if($result != $res['pass']){
			echo "旧密码不正确";die;
		}

		if($post['newpass'] != $post['newpass2'] ){
			echo "新密码不一致";die;
		}

		$post['newpass']=password_hash($post['newpass'],PASSWORD_BCRYPT);
		$pass=ShopModel::where('name','=',$user)->update(['pass'=>$post['newpass']]);
		if($pass){
			echo "修改成功,请重新登录";
			$data=[
				'user_name' => $res['name'],
				'time'=>date('Y-m-d H:i:s'),
				'ip'=>$_SERVER['REMOTE_ADDR'],
			];
			Mail::send('pass.passemail',$data,function($message) use($res){
					$to = [
                        $res['email']
					];
					$message ->to($to)->subject('修改密码成功');
			});
			header('refresh:2;url=/login');
		}

	}

}
