<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Commodity;

class CommodityController extends  Controller
{
    public function index(){

        $data = Commodity::orderBy('sort')->orderByRaw('sort is null')->paginate(10);
        return returnJson(0, '成功', $data);
    }
    public function details(){

        $post = request()->all();

        $data = Commodity::where('id',$post['id'])
            ->with(['Holder'=>function($query){
                return $query->select(['id', 'education', 'name','portraitimg']);
            }])
            ->first(['orderName','brief','money','holdersid','orderdetails','Slideshow','orderdetails',]);
        return returnJson(0, '成功', $data);
    }
}
