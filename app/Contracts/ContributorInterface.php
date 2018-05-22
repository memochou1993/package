<?php

namespace App\Contracts;

interface ContributorInterface
{
    // 取得所有貢獻者
    public function getAllContributors();
    // 取得單一貢獻者
    public function getContributorByLogin($contributor_login);
    // 取得套件的所有標籤
    public function getContributorsByPackage($package_id);
    // 取得貢獻者原始資料
    public function getContributorData($package_login, $package_name);
    // 儲存貢獻者
    public function storeContributor($package_id, $contributor_data);
}
