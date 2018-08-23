<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

session_start();
require_once 'resources/org/ValidateCode.class.php';

class LoginController extends CommonController
{

    public function login()
    {
        //Input获取表单的全部数据
        if ($input = Input::all()) {
            //echo $_SESSION["authnum_session"];
            //dd($input);
            //验证验证码输入
            $user = User::first();
            if (strtoupper($input['code']) != strtoupper($_SESSION["authnum_session"])) {
//                echo strtoupper($input['code']);
//                echo strtoupper($_SESSION["authnum_session"]);
                return back()->with('msg', '验证码错误');
            } else if ($input['user_name'] != $user->user_name && $input['user_pass'] != Crypt::decrypt($user->user_pass)) {
                return back()->with('msg', '用户名或者密码错误');
            } else {
                session(['user' => $user]);

                return redirect('admin/index');

            }
        } else {
            return view('admin.login');
        }

    }

    //验证码
    public function code()
    {
        $_vc = new \ValidateCode(); //实例化一个对象
        $_vc->doimg();
        $_SESSION['authnum_session'] = $_vc->getCode();//验证码保存到SESSION中
    }

    //退出
    public function Quit()
    {
        session(['user' => null]);
        return redirect('admin/login');
    }
}
