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
}
