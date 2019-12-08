<?php

namespace App\Http\Controllers;

use App\PostoDeTrabalho;
use Illuminate\Http\Request;

class PostoDeTrabalhoController extends Controller
{
    public function index()
    {
        $postos = PostoDeTrabalho::paginate(10);
        return view('postos/index')->with('postos', $postos);
    }

    public function store(Request $request)
    {
        PostoDeTrabalho::Create($request->all());
        return  redirect('/postos');
    }
}
