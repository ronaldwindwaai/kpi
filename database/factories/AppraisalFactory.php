<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Appraisal;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppraisalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appraisal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'current_period_of_review' => $this->faker->dateTimeThisYear,
            'previous_period_of_review' => $this->faker->dateTimeThisDecade('-1 year'),
            'user_id'   =>  User::all()->random()->id,
        ];
    }
}
