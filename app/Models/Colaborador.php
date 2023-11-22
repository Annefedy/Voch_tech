<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;
    protected $table = 'colaboradores';
    protected $fillable = [
        'id',
        'unidade_id',
        'nome',
        'cpf',
        'email',
        'created_at',
        'updated_at'
    ];
    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }
}
