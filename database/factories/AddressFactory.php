<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'address' => $this->faker->address,
            'post_code' => $this->faker->postcode,
            'city_name' => $this->faker->city,
            'country_name' => $this->faker->country,
            'person_Id' => $this->faker->numberBetween(1, 50),
        ];
    }
}
