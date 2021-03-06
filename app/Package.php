<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';

    // protected $fillable = ['name', 'login', 'type', 'html_url', 'description'];

    public function contributors()
    {
        return $this->belongsToMany(Contributor::class, 'package_contributor')
            ->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'package_tag')
            ->withTimestamps();
    }
}
