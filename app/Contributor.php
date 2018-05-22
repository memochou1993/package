<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contributor extends Model
{
    protected $table = 'contributors';

    protected $fillable = ['login', 'name'];

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_contributor')
            ->withTimestamps();
    }
}
