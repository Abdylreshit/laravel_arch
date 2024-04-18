<?php

namespace App\Containers\UserSection\Staff\Data\Factories;

use App\Containers\UserSection\Staff\Models\Staff;
use App\Containers\UserSection\User\Models\User;
use App\Ship\Core\Abstracts\Factories\Factory as ParentFactory;

class StaffFactory extends ParentFactory
{
    protected $model = Staff::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory()->createOne()->id
        ];
    }
}
