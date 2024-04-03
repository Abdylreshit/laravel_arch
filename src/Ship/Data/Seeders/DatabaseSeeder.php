<?php

namespace Database\Seeders;

use App\Ship\Core\Loaders\SeederLoaderTrait;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use SeederLoaderTrait;

    public function run(): void
    {
        $this->runLoadingSeeders();
    }
}
