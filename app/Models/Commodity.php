<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'commodity';

    /**
     * 持有者
     */
    public function Holder()
    {
        return $this->belongsTo(Holder::class, 'holdersid', 'id')->select(['id', 'name']);
    }
    public function Classification()
    {
        return $this->belongsTo(Classification::class, 'classifications', 'id')->select(['id', 'name']);
    }
}
