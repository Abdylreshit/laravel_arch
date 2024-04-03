<?php

namespace App\Ship\Core\Abstracts\Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\TestCase as LaravelTestCase;

abstract class TestCase extends LaravelTestCase
{
    /**
     * Setup the test environment, before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Reset the test environment, after each test.
     */
    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * Creates the application.
     */
    public function createApplication(): Application
    {
        $app = require __DIR__.'/../../../../../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
