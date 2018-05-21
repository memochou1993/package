<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\PackageInterface;
use App\Repositories\PackageRepository;
use App\Contracts\ContributorInterface;
use App\Repositories\ContributorRepository;
use App\Contracts\TagInterface;
use App\Repositories\TagRepository;

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
        $this->app->bind(
            TagInterface::class,
            TagRepository::class
        );
    }

    public function provides()
    {
        return [
            PackageInterface::class,
            ContributorInterface::class,
            TagInterface::class
        ];
    }
}
