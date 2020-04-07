<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ShopModel;
class UserController extends Controller
{
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
            echo "<script>alert('添加成功');location.href='/register';</script>";
        }
    }
}
