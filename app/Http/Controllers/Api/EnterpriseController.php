<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Enterprise;

class EnterpriseController extends  Controller
{
    public function index(){

        $data = Enterprise::orderBy('sort')->orderByRaw('sort is null')->paginate(10);
        return returnJson(0, '成功', $data);
    }
    public function details(){

        $post = request()->all();

        $data = Enterprise::where('id',$post['id'])

            ->first(['name','address','contentimg','skillname','skiicontent','skiimoney','entcontent','cooperation','technicalfields','logimg',]);
        return returnJson(0, '成功', $data);
    }
}
