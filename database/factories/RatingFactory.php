<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rating::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $starting_time = $this->faker->dateTimeBetween('this decade', '-1 year');
        $ending_time   = $this->faker->dateTimeBetween($starting_time, strtotime('+1 year'));
        return [
            'period_under_review_date_from' => $starting_time,
            'period_under_review_date_to' => $ending_time,
            'rating' =>  mt_rand(0, 9),
            'user_id'   =>  User::all()->random()->id,
        ];
    }
}
