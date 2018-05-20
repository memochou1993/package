<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Contracts\ContributorInterface;
use App\Contributor;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class ContributorRepository implements ContributorInterface
{
    public function getAllContributors()
    {
        $contributors = Contributor::all();

        return $contributors;
    }

    public function getContributorData($package_login, $package_name)
    {
        try {
            $client = new Client();
            $package_full_name = $package_login . "/" . $package_name;
            $response = $client->get('https://api.github.com/repos/' . $package_full_name . '/contributors')->getBody();
            $contributor_data = json_decode($response, true);

            return $contributor_data;
        } catch (ClientException $e) {

            return;
        }
    }

    public function storeContributor($package_id, $contributor_data)
    {
        foreach ($contributor_data as $contributor_data) {
            $contributor = Contributor::where('login', $contributor_data["login"])->first();

            if (empty($contributor)) {
                $contributor = new Contributor;
                $contributor->login = $contributor_data["login"];
                $contributor->save();
            }

            $contributor->packages()->attach($package_id, ['contributions' => $contributor_data["contributions"]]);
        }
    }
}
