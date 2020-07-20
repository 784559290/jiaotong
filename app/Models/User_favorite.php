<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class User_favorite extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'user_favorite';


    public function commodity(){
        return $this->hasOne(Commodity::class, 'id', 'comid')->select(['id','orderName','Slideshow','money']);
    }
}
