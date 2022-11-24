<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $roles = config('constant.roles');
        $key = array_rand($roles);
        return [
            'name' => $this->faker->name(),
            'email' => 'admin@hrm.com',
            'password' => bcrypt('password'),
            'phone_number' => $this->faker->phoneNumber(),
            'role' => $roles[$key],
            'remember_token' => Str::random(10),
        ];
    }
}
