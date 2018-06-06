<?php

namespace m3assy\nationals;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['region'];

    public function country(){
    	return $this->belongsTo('m3assy\nationals\Country');
		}
}
