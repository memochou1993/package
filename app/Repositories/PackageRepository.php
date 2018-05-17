<?php

namespace App\Repositories;

use App\Contracts\PackageInterface;
use App\Package;

class PackageRepository implements PackageInterface
{
    protected $Package;

    public function __construct(Package $Package)
    {
        $this->Package = $Package;
    }

    public function getAllPackages()
    {
        return $this->Package->all();
    }
}
