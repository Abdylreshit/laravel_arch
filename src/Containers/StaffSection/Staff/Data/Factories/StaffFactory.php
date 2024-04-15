<?php

namespace App\Containers\StaffSection\Staff\Data\Factories;

use App\Containers\StaffSection\Staff\Models\Staff;
use App\Ship\Core\Abstracts\Factories\Factory as ParentFactory;
use Illuminate\Support\Facades\Hash;

class StaffFactory extends ParentFactory
{
    protected $model = Staff::class;

    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'timezone' => $this->faker->timezone,
            'password' => '123123',
        ];
    }

    public function configure()
    {
        return $this
            ->afterCreating(function (Staff $staff) {
                $staff->update([
                    'password' => Hash::make('123123')
                ]);
            });
    }
}
