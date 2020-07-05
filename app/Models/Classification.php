<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'classification';
    

}
