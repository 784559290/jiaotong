<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Commodity;
use App\Models\Investment;
use App\Models\Order;
use App\Models\Order_son;
use App\Models\User_business;
use App\Models\User_favorite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class OrderController extends Controller
{

    public function Create(Order $order,Order_son $order_son){
        $input = request()->all();
        $uid = $this->user();
        $validator = Validator::make($input, [
            'id'=> ['required',Rule::exists('commodity')],
            'addid'=> ['required'],
            'quantity'=> ['required','numeric','integer','min:0']
        ],[],[
            'quantity' => '数量',
            'addid' => '收货地址',
            'id' => '科技成果',
        ]);
        if($validator->fails()) {
            return returnJson(1, $validator->errors()->first());     //显示第一条错误
        }
        $address = Address::where('id', $input['addid'])->where('uid',$uid->id)->value('id');
        if (empty($address)){
            return returnJson(1, '收货地址错误');
        }
        $commodity = Commodity::find($input['addid']);//科技成果

        if($commodity->quantity <= 0){
           return returnJson(408, '科技数量不足');
        }

        Commodity::where('id', $input['addid'])->decrement('quantity', $input['quantity']);
        $osn = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);//订单号


        $order_son->order_no = $osn;//订单号码
        $order_son->comid = $input['id'];//科技id
        $order_son->user_id = $uid->id;//科技id
        $order_son->quantity = (int)$input['quantity'];//数量
        $order_son->total_price = $commodity->money * (int)$input['quantity'];//总价
        $order_son->single_price = $commodity->money;//单价

        $order->user_id = $uid->id;
        $order->order_no = $osn;//订单编号
        $order->address = $input['addid'];//收货地址
        $order->payment_type = 1; //小程序支付
        $order->payment = $order_son->total_price; //付款金额
        $order->status = 1; //订单状态

        DB::transaction(function () use ($order, $order_son,$commodity) {

            $order_son->save();
            $order->save();
            //30分钟自动取消取消订单

        }, 5);


        return returnJson(0, '生成订单成功');
    }

}
