<?php

namespace m3assy\nationals;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable= ['name', 'code'];

    public function regions(){
    	return $this->hasMany('m3assy\nationals\Region');
		}
}
