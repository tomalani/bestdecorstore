<?php

namespace Database\Factories;

use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UsersFactory extends Factory
{
    protected $model = Users::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'address2' => $this->faker->address,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'zipcode' => $this->faker->postcode,
            'role' => $this->faker->randomElement([0]),
            'password' => bcrypt('password'), // You can customize the default password
        ];
    }
}
