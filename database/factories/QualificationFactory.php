<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Qualification;
use Illuminate\Database\Eloquent\Factories\Factory;

class QualificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Qualification::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle() . ' ' . 'Qualification',
            'type'    => $this->faker->randomElement([
                'academic qualification',
                'professional qualification',
                'Other Qualification',
            ]),
            'file' => $this->faker->url(),
            'description' => $this->faker->paragraph(),
            'user_id'   =>  User::all()->random()->id,
        ];
    }
}
