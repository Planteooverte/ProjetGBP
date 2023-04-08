<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OperationBancaire>
 */
class OperationBancaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //Réglagement du type d'opération bancaire
        $aleatoire=rand();
        if (fmod($aleatoire,2)==0) 
        {
            //Nombre positif
            return [
                'DateOperation' =>fake()->dateTimeThisYear(),
                'DescriptionOperation'=>fake()->text(),
                'Credit'=>fake()->numberBetween($min=1, $max=3000),
                'Debit'=>fake()->unique()->optional(0)->rien,
            ];
        }
        else {
            //Nombre negatif
            return [
                'DateOperation' =>fake()->dateTimeThisYear(),
                'DescriptionOperation'=>fake()->paragraph(),
                'Credit'=>fake()->unique()->optional(0)->rien,
                'Debit'=>fake()->numberBetween($min=1, $max=3000),
            ];
        }
    }
}
