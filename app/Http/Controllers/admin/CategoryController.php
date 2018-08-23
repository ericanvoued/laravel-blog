<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\CommonController;

class CategoryController extends CommonController
{
    //get admin/category  全部分类
    public function index(){
        $categorys = Category::all();
        $data = $this->getTree($categorys);
        return view('admin.list')->with('data',$data);
    }

    //分类排序
    public function getTree($data)
    {
        $arr = array();
        foreach ($data as $k => $v){
            if($v->cate_pid == 0){
                $arr[] = $data[$k];
                foreach ($data as $m => $n){
                    if($n->cate_pid == $v->cate_id){
                        $arr[] = $data[$m];
                    }
                }
            }
        }
        return $arr;
//        dd($arr);
    }

    //post admin/category
    public function store(){
        echo 'store';
    }

    //get admin/category/create   添加分类
    public function create(){
        echo 'create';
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




}
