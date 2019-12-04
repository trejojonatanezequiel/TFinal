<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    protected $fillable = ['id', 'date_time', 'name', 'place', 'description','price', 'large_description', 'capacity', 'created_at', 'deleted_at'];

    public function inscription()
    {
        return $this->hasMany('App\Inscription');
    }
}
