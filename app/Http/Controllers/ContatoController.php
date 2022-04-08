<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use \App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){

        $motivo_contatos = MotivoContato::all();

        $titulo = "Contato";
        return view('site.contato', compact('titulo', 'motivo_contatos'));
    }
    public function salvar(Request $request){

        $regras = [
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'required|email|unique:site_contatos',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:200'
        ];

        $mensagens = [
            // 'nome.required' => 'O campo nome deve ser preenchido!',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres!',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres!',
            // 'telefone.required' => 'O campo telefone deve ser preenchido!',
            // 'email.required' => 'O campo email deve ser preenchido!',
            'email.email' => 'O campo email deve conter um email válido!',
            'email.unique' => 'Já existe uma conta com este email',
            'motivo_contatos_id.required' => 'O campo motivo do contato deve ser preenchido!',
            // 'mensagem.required' => 'O campo mensagem deve ser preenchido!',
            'mensagem.max' => 'O campo mensagem deve ter no máximo 200 caracteres!',

            'required' => 'O Campo :attribute deve ser preenchido!'
        ];

        $request->validate($regras, $mensagens);

        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }
}
