<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
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
//        dd($input);
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
