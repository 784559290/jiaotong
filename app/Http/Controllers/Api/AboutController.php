<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Investment;
use App\Models\User_business;
use App\Models\User_favorite;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class AboutController extends Controller
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
     * 地址详情
     */
    public function AddressDetails(Address $address)
    {
        $input = request()->all();
        $uid = $this->user();
        $validator = Validator::make($input, [
            'id'=> ['sometimes','required',Rule::exists('address')->where(function ($query)use($uid){
                $query->where('uid', $uid->id);
            })]
        ]);

        if($validator->fails()) {
            return returnJson(1, $validator->errors()->first());     //显示第一条错误
        }
        if (@$input['id']) {

            $addressdata = $address::where('id',$input['id'])->where('uid',$uid->id)->select(['id','name','phone','address','province','city','areas'])->first();
        }else{

            $addressdata = $address::where('is_default',1)->where('uid',$uid->id)->select(['id','name','phone','address','province','city','areas'])->first();
        }

        return returnJson(0, '成功', $addressdata);

    }
    /**
     * Business 名片
     */

    public function business(User_business $user_business)
    {
        $user = $this->user();
        $data = $user_business::orderBy('id')->where('uid',$user->id)->with('holders')->select(['uid','id','hoid'])->paginate(10);
        return returnJson(0, '成功', $data);
    }
    /**
     * Business 收藏夹
     */

    public function favorite(User_favorite $User_favorite)
    {
        $user = $this->user();
        $data = $User_favorite::orderBy('id')->where('uid',$user->id)->with('commodity')->select(['id','comid','created_at'])->paginate(10);
        return returnJson(0, '成功', $data);
    }
}
