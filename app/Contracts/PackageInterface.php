<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface PackageInterface
{
    public function getAllPackages();
    public function getPackages($package_login);
    public function getOnePackage($package_login, $package_name);
    public function getOnePackageContributors($package_id);
    public function getPackageData();
    public function storePackage($package_data);
}
