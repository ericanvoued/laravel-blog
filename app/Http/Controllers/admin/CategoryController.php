<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\CommonController;

class CategoryController extends CommonController
{
    //get admin/category  全部分类
    public function index(){
        echo 'get';
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
