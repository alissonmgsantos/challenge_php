<?php

namespace App\Http\Controllers\API;

use App\Funcionario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = Funcionario::where('pais', '=', request('pais'))->get();
        return response()->json(['status' => true, 'data' => $funcionarios], 200);
    }
}
