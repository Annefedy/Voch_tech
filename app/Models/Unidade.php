<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    use HasFactory;
    protected $table = 'unidades';
    protected $fillable = [
        'id',
        'nome_fantasia',
        'razao_social',
        'cnpj',
        'created_at',
        'updated_at'
    ];

    public function colaboradores()
    {
        return $this->hasMany(Colaborador::class);
    }
}
