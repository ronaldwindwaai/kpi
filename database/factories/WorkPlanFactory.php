<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\WorkPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkPlanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkPlan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle(),
            'status' => mt_rand(0, 9),
            'user_id'   =>  User::all()->random()->id,
        ];
    }
}
