<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'investment';
    

}
