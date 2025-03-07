<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dni' => $this->faker->word,
            'first_name' => $this->faker->word,
            'middle_name' => $this->faker->word,
            'middle_name' => $this->faker->word,
            'second_last_name' => $this->faker->word,
            'state' => $this->faker->word,
            'workposition_id' => $this->faker->randomDigitNotNull,
            'cost_center_id' => $this->faker->randomDigitNotNull,
            'service_id' => $this->faker->randomDigitNotNull,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
