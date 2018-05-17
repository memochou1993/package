<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Contracts\PackageInterface;
use App\Package;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class PackageRepository implements PackageInterface
{
    protected $request;
    protected $package;

    public function __construct(Request $request, package $package)
    {
        $this->request = $request;
        $this->package = $package;
    }

    public function getAllPackages()
    {
        return $this->package->all();
    }

    public function getPackages($login, $name)
    {
        $packages = $this->package->where('login', $login);
        if (!empty($name)) $packages->where('name', $name);

        return $packages->get();
    }

    public function getPackageReposData($html_url)
    {
        try {
            $client = new Client();
            $package_full_name = substr(strchr($this->request->html_url, "github.com/"), 11);
            $response = $client->get('https://api.github.com/repos/' . $package_full_name)->getBody();
            $repos_data = json_decode($response, true);

            return $repos_data;
        } catch (RequestException $e) {
            return;
        }
    }

    public function storePackage($repos_data)
    {
        $package = new Package;
        $package->name = $repos_data["name"];
        $package->login = $repos_data["owner"]["login"];
        $package->html_url = $repos_data["html_url"];
        $package->description = $repos_data["description"];
        $package->watchers_count = $repos_data["watchers_count"];
        $package->forks_count = $repos_data["forks_count"];
        $package->subscribers_count = $repos_data["subscribers_count"];
        $package->save();

        return $package;
    }
}
