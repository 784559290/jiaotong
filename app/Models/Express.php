<?php

namespace App\Models;

use App\User;
use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Express extends Model
{
	use HasDateTimeFormatter;

    protected $table = 'express';
    public function user(){
        return $this->hasOne(User::class,'id','user_id')->select(['id','nickname']);
    }



}
