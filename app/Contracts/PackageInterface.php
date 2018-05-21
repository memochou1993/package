<?php

namespace App\Contracts;

interface PackageInterface
{
    public function getAllPackages();
    public function getPackages($package_login);
    public function getOnePackage($package_login, $package_name);
    public function getOnePackageContributor($package_id);
    public function getPackageData();
    public function storePackage($package_data);
}
