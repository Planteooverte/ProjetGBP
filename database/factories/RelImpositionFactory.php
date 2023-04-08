<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RelImpot>
 */
class RelImpositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'AnneeFiscal' =>fake()->year(),
            'Montant' =>fake()->numberBetween($min=800, $max=1500),
            'DateEtablissement' =>fake()->dateTime(),
            'TauxImposition' =>fake()->numberBetween($min=6, $max=15),
            'RevenuFiscalDeReference' =>fake()->numberBetween($min=28000, $max=45000),
            'NbrDePart' => 1,
        ];
    }
}
