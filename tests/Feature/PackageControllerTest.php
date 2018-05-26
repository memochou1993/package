<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Contracts\PackageInterface;
use App\Http\Controllers\PackageController;
use Illuminate\Database\Eloquent\Collection;

class PackageControllerTest extends TestCase
{
    protected $mock;
    protected $target;

    public function setUp()
    {
        parent::setUp();

        parent::initDatabase();

        $this->mock = $this->initMock(PackageInterface::class);
        $this->target = $this->app->make(PackageController::class);
    }

    public function testIndex()
    {
        $expected = new Collection([
            ['name' => 'Name 1', 'html_url' => 'HTML URL 1'],
            ['name' => 'Name 2', 'html_url' => 'HTML URL 2'],
            ['name' => 'Name 3', 'html_url' => 'HTML URL 3'],
        ]);

        $this->mock
            ->shouldReceive('getAllPackages')
            ->once()
            ->andReturn($expected);

        $actual = $this->target->index()->packages;

        $this->assertEquals($expected, $actual);
    }

    public function tearDown()
    {
        parent::resetDatabase();

        $this->mock = null;
        $this->target = null;
    }
}
