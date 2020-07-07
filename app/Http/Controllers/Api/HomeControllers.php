<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Enterprise;
use Illuminate\Support\Facades\Cache;

class HomeControllers extends Controller
{
    public function index()
    {
        //获取推荐
        $homeswiper = Cache::get('img',[]);
        //企业
        $Enterprise = Enterprise::get(['']);
    }
}
