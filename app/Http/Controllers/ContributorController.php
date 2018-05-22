<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\ContributorInterface;

class ContributorController extends Controller
{
    protected $request;
    protected $contributor;

    public function __construct(Request $request, ContributorInterface $contributor)
    {
        $this->request = $request;
        $this->contributor = $contributor;
    }

    public function index()
    {
        $contributors = $this->contributor->getAllContributors();

        return view('contributor.index', compact('contributors'));
    }

    public function show($contributor_login)
    {
        $contributor = $this->contributor->getContributorByLogin($contributor_login);

        return view('contributor.show', compact('contributor'));
    }

    public function create($package_id)
    {
        $contributors = $this->contributor->getContributorsByPackage($package_id);

        return view('package.contributor.create', compact('contributors'));
    }
}
