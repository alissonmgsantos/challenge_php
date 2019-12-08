<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostoDeTrabalho extends Model
{
    protected $table = 'postos_de_trabalho';
    public $timestamps = true;

    protected $fillable = ['id', 'nome', 'tipo', 'descricao'];

    public function funcionarios()
    {
        return $this->belongsToMany(Funcionario::class);
    }
}
