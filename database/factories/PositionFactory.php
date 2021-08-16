<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

class PositionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Position::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $starting_time = $this->faker->dateTimeBetween('this decade', '+3 years');
        $ending_time   = $this->faker->dateTimeBetween($starting_time, strtotime('+6 years'));
        return [
            'title' => $this->faker->jobTitle(),
            'employer' => $this->faker->company(),
            'from_date' => $starting_time,
            'to_date' => $ending_time,
            'country' => $this->faker->country(),
            'user_id'   =>  User::all()->random()->id,
        ];
    }
}
