<?php

namespace App\Models;

use App\User;
use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	use HasDateTimeFormatter;

    protected $table = 'order';
    public function user(){
        return $this->hasOne(User::class,'id','user_id')->select(['id','nickname']);
    }
    public function address(){
        return $this->hasOne(Address::class,'id','address')->select(['id','name','phone','address','province','city','areas']);
    }
    public function order_sons(){
        return $this->hasOne(Order_son::class,'order_id','id')->select(['id','order_id','comid','quantity','total_price','single_price']);
    }

    public function commodity()
    {
        return $this->hasOneThrough(
            Commodity::class,//目标表
            Order_son::class,//中间表
            'order_no', // 中间表查询
            'id', //目标表的id
            'order_no', // 第一次查询
            'comid' //中间表的外键
        )->select(['*']);
    }
}
