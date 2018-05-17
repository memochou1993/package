<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'name',
        'login',
        'description',
        'watchers_count',
        'forks_count',
        'subscribers_count'
    ];
}
