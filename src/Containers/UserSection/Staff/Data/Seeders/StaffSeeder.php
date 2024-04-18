<?php

namespace App\Containers\UserSection\Staff\Data\Seeders;

use App\Containers\UserSection\Staff\Data\Factories\StaffFactory;
use App\Containers\UserSection\User\Models\User;
use App\Ship\Core\Abstracts\Seeders\Seeder as ParentSeeder;

class StaffSeeder extends ParentSeeder
{
    public function run(): void
    {
        StaffFactory::new()->createOne([
            'user_id' => User::factory()->createOne([
                'email' => 'admin@admin.com'
            ])
                ->id,
        ]);


    }
}
