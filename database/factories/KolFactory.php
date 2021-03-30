<?php

namespace Database\Factories;

use App\Models\Kol;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class KolFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kol::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'username' => $this->faker->username,
            'tanggalLahir' => $this->faker->dateTime,
            'tempatLahir' => $this->faker->city,
            'contact_person' => $this->faker->phoneNumber,
            'password' => $this->faker->sha1,
            'bank_name' => $this->faker->randomDigit,
            'bank_account' => $this->faker->name,
            'location' => $this->faker->randomDigit,
            'religion' => $this->faker->randomDigit,
            'description' => $this->faker->text,
        ];
    }
}
