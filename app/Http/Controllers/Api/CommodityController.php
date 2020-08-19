<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Classification;
use App\Models\Commodity;

class CommodityController extends  Controller
{
    public function index(){

        $inputdata = request()->input();
        $classification = request()->input('classification','');
        $type = Classification::all(['name','id']);
        $classification = $classification ? $classification : $type[0]->id;
        $data['data'] = Commodity::orderBy('sort')->where('classifications',$classification)->orderByRaw('sort is null')->paginate(10);
        $data['classification'] = $type;
        return returnJson(0, '成功', $data);
    }
    public function details(){

        $post = request()->all();

        $data = Commodity::where('id',$post['id'])
            ->with(['Holder'=>function($query){
                return $query->select(['id', 'education','research', 'name','portraitimg','title']);
            }])
            ->first(['orderName','brief','money','holdersid','orderdetails','Slideshow','orderdetails',]);
        return returnJson(0, '成功', $data);
    }
}
