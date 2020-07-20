<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Investment;


class InvestmentController extends Controller
{

    public function index(){

        $data = Investment::orderBy('sort')->orderByRaw('sort is null')->select(['id','name','field','content','logimg','created_at'])->paginate(10);
        return returnJson(0, '成功', $data);
    }
    public function details(){

        $post = request()->all();

        $data = Investment::where('id',$post['id'])
            ->first(['id','name','field','content','logimg','created_at']);
        return returnJson(0, '成功', $data);
    }


}
