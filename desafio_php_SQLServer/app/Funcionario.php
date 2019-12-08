<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionarios';
    public $timestamps = true;

    protected $fillable = ['id', 'nome', 'data_de_nascimento', 'cidade', 'pais', 'telefone'];

    public function getDataDeNascimentoAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    public function postos()
    {
        return $this->belongsToMany(FuncionarioPosto::class);
    }
}
