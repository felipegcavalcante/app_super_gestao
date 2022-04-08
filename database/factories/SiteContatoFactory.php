<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SiteContatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'name' => $this->faker->name(),
            // 'email' => $this->faker->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // 'remember_token' => Str::random(10),

            'nome' => $this->faker->name(),
            'telefone' => $this->faker->tollFreePhoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'motivo_contato' => $this->faker->numberBetween(1,3),
            'mensagem' => $this->faker->text(200)
        ];
    }
}
