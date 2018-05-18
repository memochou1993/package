<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contributor extends Model
{
    protected $table = 'contributors';

    protected $guarded = ['*'];

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_contributor');
    }
}
