<?php

namespace App\Contracts;

interface ContributorInterface
{
    public function getAllContributors();
    public function getContributorByLogin($contributor_login);
    public function getContributorsByPackage($package_id);
    public function getContributorData($package_login, $package_name);
    public function storeContributor($package_id, $contributor_data);
}
