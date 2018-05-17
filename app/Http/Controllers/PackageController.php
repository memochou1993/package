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

        dd($packages);
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

        $repos_data = $this->package->getPackageReposData($this->request->html_url);
        if (empty($repos_data)) return redirect()->back()->withErrors(['message' => 'Whoops!']);

        $package = $this->package->storePackage($repos_data);
        return redirect()->route('packages.show', [$package->login, $package->name]);
    }

    public function show($login, $name = null)
    {
        $packages = $this->package->getPackages($login, $name);

        dd($packages);
    }
}
