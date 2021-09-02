<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_cliente' => $this->faker->unique()->numberBetween(0, 29),
            'razon_social' => $this->faker->name(),
            'domicilio' => $this->faker->streetAddress(),
            'localidad' => $this->faker->city(),
            'cp' => rand(1000,9999),
            'provincia' => $this->faker->state(),
            'telefono' => $this->faker->tollFreePhoneNumber(),
            'email' => $this->faker->email(),
            'contacto' => $this->faker->name(),
            'bonificacion' => 0,
            'zona' => $this->faker->randomElement(['sur', 'norte']),
            'vendedor' => $this->faker->name(),
            'cuit' => $this->faker->isbn10(),
            'id_lista' => $this->faker->randomDigit(),     
            'lista' => $this->faker->sentence(1),          
            'pago' => 'pago',
            'saldo' => 100,          
            'limite_credito' => 200,
            'observacion' => $this->faker->sentence(4)
        ];
    }
}
