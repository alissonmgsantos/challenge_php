<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\FuncionarioPosto;
use App\PostoDeTrabalho;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::paginate(10);
        $postos = PostoDeTrabalho::all();

        return view('funcionarios/index')
            ->with(['funcionarios' => $funcionarios, 'postos' => $postos]);
    }

    public function store(Request $request)
    {
        $funcionario_request = [
            "nome" => $request->get('nome'),
            "data_de_nascimento" => $request->get('data_de_nascimento'),
            "cidade" => $request->get('cidade'),
            "pais" => $request->get('pais'),
            "telefone" => $request->get('telefone'),
        ];

       $funcionario = Funcionario::Create($funcionario_request);

        $funcionario_posto = [
            'id_funcionario'        => $funcionario->id,
            'id_posto_de_trabalho'  => $request->get('posto_id'),
            "data_expiracao"        => $request->get('data_expiracao'),
        ];

        FuncionarioPosto::create($funcionario_posto);

        return  redirect('/funcionarios');
    }
}
