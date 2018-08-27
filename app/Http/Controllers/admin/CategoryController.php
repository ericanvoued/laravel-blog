<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\CommonController;
use Illuminate\Support\Facades\Input;

class CategoryController extends CommonController
{
    //get admin/category  全部分类
    public function index(){
        $categorys = (new Category)->tree();
        return view('admin.list')->with('data',$categorys);
    }


    //post admin/category 添加分类提交
    public function store(){

        $input = Input::all();

        $rules = [
            'cate_name' => 'required|between:1,50',
//            'cate_name' => 'required|between:1,50',
//            'cate_name' => 'required|between:1,50',
//            'cate_name' => 'required|between:1,50',

        ];

        $massage = [
            'cate_name.required' => '分类名称不能为空',
            'cate_name.between' => '分类名称长度在1到50之间',

        ];

        $validator = Validator::make($input, $rules, $massage);

        if($validator->passes()) {
            dd($input);
        }else{
            return back()->withErrors($validator);
        }
    }

    //get admin/category/create   添加分类
    public function create(){
        $data = Category::where('cate_pid',0)->get();
        return view('admin.add',compact('data'));
    }

    //delete admin/category/{category}   删除单个分类
    public function destroy(){
        echo 'destroy';
    }

    //get admin/category/{category}   显示单个分类信息
    public function show(){
        echo 'show';
    }

    //put admin/category/{category}  更新分类
    public function update(){
        echo 'update';
    }

    //get admin/category/{category}/edit   编辑分类
    public function edit(){
        echo 'edit';
    }


    public function changeorder(){
        $input = Input::all();
//        dd($input['order']);
        $cate = Category::find($input['cate_id']);
        $cate->cate_order = $input['order'];
        $res = $cate->update();
        if ($res==1){
            $data = [
                'status'=>1,
                'msg'=>'分类排序更新成功',
            ];
            return $data;
        }else{
            $data = [
                'status'=>0,
                'msg'=>'分类排序更新失败,请重试',
            ];
            return $data;
        }
    }


}
