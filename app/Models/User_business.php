<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class User_business extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'user_business';

    /**
     * 持有人
     */
    public function holders(){
        return $this->hasOne(Holder::class,'id','hoid')->select(['id','name','research','education','portraitimg']);

    }
}
