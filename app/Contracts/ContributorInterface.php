<?php

namespace App\Contracts;

interface ContributorInterface
{
    public function getContributorData($package_login, $package_name);
    public function storeContributor($package_id, $contributors_data);
}
