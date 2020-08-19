<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Classification;
use App\Models\Holder;

class HoldersController extends  Controller
{
    public function index(){


        $inputdata = request()->input();
        $classification = request()->input('classification','');
        $type = Classification::all(['name','id']);
        $classification = $classification ? $classification : $type[0]->id;
        $data['Holders'] = Holder::orderBy('sort')->where('classification',$classification)->orderByRaw('sort is null')->select(['name','portraitimg','research','education','title','id'])->paginate(10);
        $data['classification'] = $type;
        return returnJson(0, '成功', $data);
    }
    public function details(){

        $post = request()->all();

        $data = Holder::where('id',$post['id'])
            ->with(['Science'=>function($query){
                return $query->select(['id', 'orderName', 'recommendimg','money','holdersid']);
            }])
            ->first(['id','name','portraitimg','details','research','education','title',]);
        return returnJson(0, '成功', $data);
    }
}
