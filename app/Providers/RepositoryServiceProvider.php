<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\PackageInterface;
use App\Repositories\PackageRepository;
use App\Contracts\ContributorInterface;
use App\Repositories\ContributorRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->bind(
            PackageInterface::class,
            PackageRepository::class
        );
        $this->app->bind(
            ContributorInterface::class,
            ContributorRepository::class
        );
    }

    public function provides()
    {
        return [
            PackageInterface::class,
            ContributorInterface::class
        ];
    }
}
