<?php

namespace App\Containers\UserSection\User\Data\Factories;

use App\Containers\UserSection\User\Models\User;
use App\Ship\Core\Abstracts\Factories\Factory as ParentFactory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends ParentFactory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->unique()->email,
            'phone' => $this->faker->unique()->phoneNumber,
            'timezone' => $this->faker->timezone,
            'password' => '123123',
        ];
    }

    public function configure()
    {
        return $this
            ->afterCreating(function (User $user) {
                $user->update([
                    'password' => Hash::make('123123'),
                ]);
            });
    }
}
