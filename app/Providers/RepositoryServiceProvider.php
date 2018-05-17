<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\PackageInterface;
use App\Repositories\PackageRepository;

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
    }

    public function provides()
    {
        return [PackageInterface::class];
    }
}
