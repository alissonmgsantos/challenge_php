<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuncionarioPosto extends Model
{
    protected $table = 'funcionarios_postos_de_trabalho';
    public $timestamps = true;

    protected $fillable = ['id', 'id_funcionario', 'id_posto_de_trabalho', 'data_inicio', 'data_expiracao'];

    public function funcionarios()
    {
        return $this->belongsToMany(Funcionario::class);
    }
}
