<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Cargo;

use App\Models\Colaborador;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CargoColaborador>
 */
// database/factories/CargoColaboradorFactory.php

class CargoColaboradorFactory extends Factory
{
    protected $model = CargoColaborador::class;

    public function definition()
    {
        return [
            'cargo_id' => Cargo::factory(),
            'colaborador_id' => Colaborador::factory(),
            'nota_desempenho' => $this->faker->randomFloat(1, 0, 10),
        ];
    }
}