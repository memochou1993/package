<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Package;

class PackageTest extends TestCase
{
    protected $package;

    public function setUp()
    {
        parent::setUp();

        $this->initDatabase();

        $this->package = New Package;
    }

    public function testGetAllPackages()
    {
        $packages = $this->package->get();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $packages);

        $this->assertEquals(20, $packages->count());
    }

    public function tearDown()
    {
        $this->resetDatabase();
    }
}
