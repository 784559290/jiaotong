<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Investment;
use App\Models\User_business;
use App\Models\User_favorite;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class SaveAboutController extends Controller
{

    public function index(){


    }
    public function details(){


    }

    /**
     * 地址列表
     */
    public function addresslist(){


    }

    /**
     * 添加地址
     *
     */
    public function addressincrease(Address $address)
    {
        $input = request()->all();

        $validator = Validator::make($input, [
            'phone'=> 'required',
            'name' => 'required',
            'address' => 'required',
            'region' => 'required',
        ]);

        if($validator->fails()) {
            return returnJson(1, $validator->errors()->first());     //显示第一条错误
        }
        $uid = $this->user()->id;
        $addresscount = $address->where('uid', $uid)->value('id');
        $address->is_default = $addresscount ? 0 : 1;
        $address->uid = $uid;
        $address->phone = $input['phone'];
        $address->name = $input['name'];
        $address->address = $input['address'];
        $address->province = $input['region'][0];
        $address->city = $input['region'][1];
        $address->areas = $input['region'][2];
        $address->save();
        return returnJson(0, '新增成功');
    }

    /**
     * Business 名片
     */
    public function business(User_business $user_business)
    {
        $input = request()->all();
        $uid = $this->user();
        $validator = Validator::make($input, [
            'hoid'=> ['required',Rule::unique('user_business')->where(function ($query)use($uid){
                $query->where('uid', $uid->id);
            })]
        ]);

        if($validator->fails()) {
            return returnJson(1, $validator->errors()->first());     //显示第一条错误
        }
        $user_business->uid = $uid->id;
        $user_business->hoid = $input['hoid'];
        $user_business->save();
        return returnJson(0, '添加成功');

    }
    /**
     * Business 收藏
     */
    public function favorite(User_favorite $user_favorite)
    {
        $input = request()->all();
        $uid = $this->user();
        $validator = Validator::make($input, [
            'comid'=> ['required',Rule::unique('user_favorite')->where(function ($query)use($uid){
                $query->where('uid', $uid->id);
            })]
        ]);

        if($validator->fails()) {
            return returnJson(1, $validator->errors()->first());     //显示第一条错误
        }
        $user_favorite->uid = $uid->id;
        $user_favorite->comid = $input['comid'];
        $user_favorite->save();
        return returnJson(0, '添加成功');

    }
}
