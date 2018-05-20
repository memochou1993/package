<?php

namespace App\Contracts;

interface ContributorInterface
{
    public function getAllContributors();
    public function getContributorData($package_login, $package_name);
    public function storeContributor($package_id, $contributor_data);
}
