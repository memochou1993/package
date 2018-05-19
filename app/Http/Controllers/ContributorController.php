<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contributor;

class ContributorController extends Controller
{
    public function index()
    {
        $contributors = Contributor::all();

        return view('contributor.index', compact('contributors'));
    }
}
