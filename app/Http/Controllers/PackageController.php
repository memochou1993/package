<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\PackageInterface;

class PackageController extends Controller
{
    protected $request;
    protected $package;

    public function __construct(Request $request, PackageInterface $package)
    {
        $this->request = $request;
        $this->package = $package;
    }

    public function index()
    {
        $packages = $this->package->getAllPackages();

        return view('package.index', compact('packages'));
    }

    public function create()
    {
        return view('package.create');
    }

    public function store()
    {
        $this->validate($this->request, [
            'html_url' => 'required',
        ]);

        $package_data = $this->package->getPackageData($this->request->html_url);
        if (empty($package_data)) return redirect()->back()->withErrors(['message' => 'Woops!']);

        $package = $this->package->storePackage($package_data);
        return redirect()->route('packages.show', [$package->login, $package->name]);
    }

    public function list($package_login)
    {
        $packages = $this->package->getPackages($package_login);

        return view('package.list', compact('packages'));
    }

    public function show($package_login, $package_name)
    {
        $package = $this->package->getOnePackage($package_login, $package_name);
        $contributors = $this->package->getContributors($package->id);

        return view('package.show', compact('package', 'contributors'));
    }
}
