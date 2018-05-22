<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Contracts\ContributorInterface;
use App\Package;
use App\Contributor;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class ContributorRepository implements ContributorInterface
{
    protected $request;
    protected $package;
    protected $contributor;

    public function __construct(Request $request, Package $package, Contributor $contributor)
    {
        $this->request = $request;
        $this->package = $package;
        $this->contributor = $contributor;
    }

    public function getAllContributors()
    {
        $contributors = $this->contributor->get();

        return $contributors;

    }

    public function getContributorByLogin($contributor_login)
    {
        $contributor = $this->contributor->where('login', $contributor_login)->firstOrFail();

        return $contributor;
    }

    public function getContributorsByPackage($package_id)
    {
        $contributors = $this->package->find($package_id)->contributors()->get();

        return $contributors;
    }

    public function getContributorData($package_login, $package_name)
    {
        try {
            $client = new Client();
            $package_full_name = $package_login . "/" . $package_name;
            $response = $client->get('https://api.github.com/repos/' . $package_full_name . '/contributors')->getBody();
            $response = json_decode($response, true);
            $response = $client->get('https://api.github.com/users/' . $response[0]["login"])->getBody();
            $contributor_data = json_decode($response, true);

            return $contributor_data;
        } catch (ClientException $e) {

            return;
        }
    }

    public function storeContributor($package_id, $contributor_data)
    {
        $contributor = $this->contributor->firstOrCreate([
            'login' => $contributor_data["login"],
        ], [
            'login' => $contributor_data["login"],
            'name' => $contributor_data["name"],
        ]);

        $contributor->packages()->attach($package_id);
    }
}
