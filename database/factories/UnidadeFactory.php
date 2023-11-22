<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unidade>
 */
// database/factories/UnidadeFactory.php

class UnidadeFactory extends Factory
{
    protected $model = Unidade::class;

    public function definition()
    {
        return [
            'nome_fantasia' => $this->faker->company,
            'razao_social' => $this->faker->company,
            'cnpj' => $this->faker->unique()->cnpj,
        ];
    }
}