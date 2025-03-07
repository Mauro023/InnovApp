<?php

namespace Database\Factories;

use App\Models\MonthlyData;
use Illuminate\Database\Eloquent\Factories\Factory;

class MonthlyDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MonthlyData::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'year' => $this->faker->randomDigitNotNull,
        'month' => $this->faker->randomDigitNotNull,
        'amounth' => $this->faker->randomDigitNotNull,
        'id_advisor' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
