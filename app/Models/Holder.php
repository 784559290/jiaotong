<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Holder extends Model
{
	use HasDateTimeFormatter;

	//持有人科技
	public function Science(){
        return $this->hasMany(Commodity::class, 'holdersid', 'id');
    }
}
