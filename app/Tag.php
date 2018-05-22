<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['topic', 'name'];

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_tag');
    }
}
