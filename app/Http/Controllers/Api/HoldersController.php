<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Holder;

class HoldersController extends  Controller
{
    public function index(){

        $data = Holder::orderBy('sort')->orderByRaw('sort is null')->paginate(10);
        return returnJson(0, '成功', $data);
    }
    public function details(){

        $post = request()->all();

        $data = Holder::where('id',$post['id'])
            ->with(['Science'=>function($query){
                return $query->select(['id', 'orderName', 'Slideshow','money','holdersid']);
            }])
            ->first(['id','name','study','portraitimg','details','research','education','title',]);
        return returnJson(0, '成功', $data);
    }
}
