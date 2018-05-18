<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';

    protected $guarded = ['*'];

    public function contributors()
    {
        return $this->belongsToMany(Contributor::class, 'package_contributor');
    }
}
