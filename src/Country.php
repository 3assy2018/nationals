<?php

namespace M3assy\Nationals;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name', 'code'];

    public function regions()
    {
        return $this->hasMany('M3assy\Nationals\Region');
    }
}
