<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Colaborador>
 */
// database/factories/ColaboradorFactory.php

use App\Models\Unidade;


class ColaboradorFactory extends Factory
{
    protected $model = Colaborador::class;

    public function definition()
    {
        return [
            'unidade_id' => Unidade::factory(),
            'nome' => $this->faker->name,
            'cpf' => $this->faker->unique()->cpf,
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
