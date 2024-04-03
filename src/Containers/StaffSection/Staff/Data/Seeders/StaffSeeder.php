<?php

namespace App\Containers\StaffSection\Staff\Data\Seeders;

use App\Containers\StaffSection\Staff\Data\Factories\StaffFactory;
use App\Ship\Core\Abstracts\Seeders\Seeder as ParentSeeder;

class StaffSeeder extends ParentSeeder
{
    public function run(): void
    {
        StaffFactory::new()->createOne([
            'email' => 'admin@admin.com'
        ]);
    }
}
