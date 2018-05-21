<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Contracts\PackageInterface;
use App\Package;
use App\Contributor;
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
        $packages = $this->package->with('topics')->get();

        return $packages;
    }

    public function getPackages($package_login)
    {
        $packages = $this->package->where('login', $package_login)->get();

        return $packages;
    }

    public function getOnePackage($package_login, $package_name)
    {
        $package = $this->package->with('contributors')->with('topics')->where(['login' => $package_login, 'name' => $package_name]);

        return $package->firstOrFail();
    }

    public function getOnePackageContributor($package_id)
    {
        $contributor = Package::find($package_id)->contributors()->first();

        return $contributor;
    }

    public function getOnePackageTopics($package_id)
    {
        $topics = Package::find($package_id)->topics()->get();

        return $topics;
    }

    public function getPackageData()
    {
        try {
            $client = new Client();
            $package_full_name = substr(strchr($this->request->html_url, "github.com/"), 11);
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
}
