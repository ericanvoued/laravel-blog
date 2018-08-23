<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Support\Facades\Crypt;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    //info模板
    public function info()
    {
        return view('admin.info');
    }

    //修改密码
    public function pass()
    {
        if ($input = Input::all()) {

            $rules = [
                'password' => 'required|between:6,20|confirmed',
                'password_o' => 'required|between:6,20',

            ];

            $messages = [
                'password_o.required' => '旧密码不能为空！',
                'password.required' => '新密码不能为空！',
                'password_o.between' => '旧密码必须在6到20位之间！',
                'password.between' => '新密码必须在6到20位之间！',
                'password.confirmed'=>'新密码和确认密码不一致',
            ];

            $validator = Validator::make($input, $rules, $messages);

            if ($validator->passes()) {

               $user = User::first();
               $_password = Crypt::decrypt($user ->user_pass);

               if($input['password_o'] == $_password){
                    $user->user_pass = Crypt::encrypt($input['password']);
                    $user->update();
                   return back()-> with('errors','密码修改成功！');
               }else{
                   return back()-> with('errors','原密码不正确！');
               }

            } else {
                return back()-> withErrors($validator);
            }

        } else {
            return view('admin.pass');
        }

    }
}
