<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_llista_vouchers' => $this->faker->numberBetween(1,300000),
            'id_rol' => $this->faker->numberBetween(0,1),
            'name' => $this->faker->sentence(3),
            'password' => $this->faker->password,
            'dni' => $this->faker->text,
            'email' => $this->faker->email,
            'telèfon' => $this->faker->phoneNumber,
            'país' => $this->faker->country,
            'organització' => $this->faker->company,


            /*
            $table->increments('id_user')->unique();
            $table->id('id_llista_vouchers')->unique()->nullable();
            $table->id('id_rol');
            $table->string("name");
            $table->string("password");
            $table->string("dni")->unique();
            $table->string("email")->unique();
            $table->string("telèfon");
            $table->string("país");
            $table->string("organització")->nullable();
             */
        ];
    }
}
