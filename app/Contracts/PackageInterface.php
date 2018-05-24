<?php

namespace App\Contracts;

interface PackageInterface
{
    public function getAllPackages();
    public function getPackageByLogin($package_login);
    public function getPackageByFullName($package_login, $package_name);
    public function getPackageById($package_id);
    public function storePackage($package_html_url);
    public function updatePackage($package_id);
}
