<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Contracts\PackageInterface;
use App\Package;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class PackageRepository implements PackageInterface
{
    protected $request;
    protected $package;

    public function __construct(Request $request, Package $package)
    {
        $this->request = $request;
        $this->package = $package;
    }

    public function getAllPackages()
    {
        $packages = $this->package->all();

        return $packages;
    }

    public function getPackageByLogin($package_login)
    {
        $packages = $this->package->where('login', $package_login)->get();

        return $packages;
    }

    public function getPackageByFullName($package_login, $package_name)
    {
        $package = $this->package->where(['login' => $package_login, 'name' => $package_name])->firstOrFail();

        return $package;
    }

    public function getPackageById($package_id)
    {
        $package = $this->package->find($package_id)->firstOrFail();

        return $package;
    }

    public function getPackageData($package_html_url)
    {
        try {
            $client = new Client();
            $package_full_name = substr(strchr($package_html_url, "github.com/"), 11);
            $response = $client->get('https://api.github.com/repos/' . $package_full_name)->getBody();
            $package_data = json_decode($response, true);

            return $package_data;
        } catch (ClientException $e) {

            return;
        }
    }

    public function storePackage($package_data)
    {
        $package = new Package;
        $package->name = $package_data["name"];
        $package->login = $package_data["owner"]["login"];
        $package->html_url = $package_data["html_url"];
        $package->description = $package_data["description"];
        $package->watchers_count = $package_data["watchers_count"];
        $package->forks_count = $package_data["forks_count"];
        $package->subscribers_count = $package_data["subscribers_count"];
        $package->save();

        return $package;
    }

    public function updatePackage($package_id)
    {
        $package = $this->package->find($package_id);
        $package->description = $this->request->description;
        $package->save();

        return $package;
    }
}
