<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface PackageInterface
{
    public function getAllPackages();
    public function getPackages($name, $login);
    public function getPackageReposData($html_url);
    public function storePackage($repos_data);
}
