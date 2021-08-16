<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Department;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Department::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' =>  $this->faker->unique()->randomElement([
                'Office of the Secretary General',
                'Finance Department',
                'Human Resource Department',
                'Administration Department',
                'Programmes Department',
            ]),
            'description' =>  $this->faker->realText(),
            'manager_id'   =>  User::all()->random()->id,
        ];
    }
}
