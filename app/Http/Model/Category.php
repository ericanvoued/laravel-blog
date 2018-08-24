<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'cate_id';
    public $timestamps = false;

    public function tree(){
        $categorys = $this->orderBy('cate_order','asc')->get();
        return $data = $this->getTree($categorys);
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
}
