<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    // protected $fillable = ['name'];

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_contributor');
    }
}
