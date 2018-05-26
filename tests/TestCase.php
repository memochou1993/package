<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Artisan;
use Mockery;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function initDatabase()
    {
        config([
            'database.default' => 'sqlite',
            'database.connections.sqlite' => [
                'driver' => 'sqlite',
                'database' => ':memory:',
                'prefix' => '',
            ],
        ]);

        Artisan::call('migrate');

        Artisan::call('db:seed');
    }

    public function initMock($class)
    {
        $mock = Mockery::mock($class);
        $this->app->instance($class, $mock);

        return $mock;
    }

    protected function resetDatabase()
    {
        Artisan::call('migrate:reset');
    }
}
