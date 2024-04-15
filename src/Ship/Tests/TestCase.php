<?php

namespace App\Ship\Tests;

use App\Ship\Core\Abstracts\Tests\TestCase as ParentTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestCase extends ParentTestCase
{
    use RefreshDatabase;
}
