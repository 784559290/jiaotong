<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'enterprise';
    

}
