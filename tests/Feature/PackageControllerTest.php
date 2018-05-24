<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\PackageRepository;
use Mockery;

class PackageControllerTest extends TestCase
{
    protected $mock;

    public function setUp()
    {
        parent::setUp();

        $this->mock = $this->mock('App\Repositories\PackageRepository');
    }

    public function mock($class)
    {
        $mock = Mockery::mock($class);
        $this->app->instance($class, $mock);

        return $mock;
    }

    public function testIndex()
    {
        $this->mock
            ->shouldReceive('getAllPackages')
            ->once()
            ->andReturn([]);

        $response = $this->get('/packages');

        $response->assertViewHas('packages');
    }

    public function testStore()
    {
        $package_html_url = 'https://github.com/laravel/framework';

        $this->mock
            ->shouldReceive('storePackage')
            ->once();

        $response = $this->post('/packages', [
            'html_url' => $package_html_url,
        ]);

        $response->assertStatus(302);
    }

    public function tearDown()
    {
        //
    }
}
