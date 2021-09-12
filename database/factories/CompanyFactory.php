<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'company_id' => $this->faker->unique()->numberBetween(0, 5),
            'name' => $this->faker->name(),
            'api_token' => $this->faker->regexify('[A-Za-z0-9]{20}')
        ];
    }
}
