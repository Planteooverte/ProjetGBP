<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FicheDePaye>
 */
class FicheDePayeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'Periode' =>fake()->dateTimeThisYear(),
            'SalaireBrut'=> 2800.00,
            'SalaireNet'=> 2128.00,
            'ChargeEmployeur' => 1120.00,
        ];
    }
}
