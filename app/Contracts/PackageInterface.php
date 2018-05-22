<?php

namespace App\Contracts;

interface PackageInterface
{
    // 取得所有套件
    public function getAllPackages();
    // 取得作者所有套件
    public function getPackageByLogin($package_login);
    public function getPackageByFullName($package_login, $package_name);
    public function getPackageById($package_id);
    public function getPackageData($package_html_url);
    public function storePackage($package_data);
    public function updatePackage($package_id);
}
