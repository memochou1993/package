<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\PackageInterface;

class PackageController extends Controller
{
    protected $packages;

    public function __construct(PackageInterface $packages)
    {
        $this->packages = $packages;
    }

    public function index()
    {
        $packages = $this->packages->getAllPackages();

        dd($packages);
    }
}
