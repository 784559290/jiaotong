<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Commodity;
use App\Models\Enterprise;
use Illuminate\Support\Facades\Cache;

class HomeControllers extends Controller
{
    public function index()
    {
        //获取推荐
        $data['homeswiper'] = Cache::get('img',[]);
        //企业
        $data['Enterprise'] = Enterprise::get(['name']);
        $data['commodity'] = Commodity::get();
        //array_column();
        return returnJson(0, '成功', $data);
    }
}
