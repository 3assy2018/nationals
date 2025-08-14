<?php

namespace M3assy\Nationals;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['region'];

    public function country()
    {
        return $this->belongsTo('M3assy\Nationals\Country');
    }
}
