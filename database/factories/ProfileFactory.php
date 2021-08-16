<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $job_title = $this->faker->jobTitle;
        return [
            'passport_id' => $this->faker->randomDigit,
            'dob' => $this->faker->dateTimeThisCentury->format('Y-m-d'),
            'job_title' => $job_title,
            'current_position' => $job_title,
            'date_of_engagement' => $this->faker->dateTimeThisCentury->format('Y-m-d'),
            'date_appointed' => $this->faker->dateTimeThisDecade(),
            'salary_scale' => $this->faker->randomAscii(),
            'salary_scale' => $this->faker->randomAscii(),
            'current_salary_notch' => $this->faker->randomAscii(),
            'office_file_no' => $this->faker->ean13, //barcode
            'user_id'   =>  User::factory(),
            'department_id'   => Department::all()->random()->id,
        ];
    }
}
