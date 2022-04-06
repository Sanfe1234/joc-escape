<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RolsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(2),

            /*
            $table->id('id_rol');
            $table->string('nom_rol');
             */
        ];
    }
}
