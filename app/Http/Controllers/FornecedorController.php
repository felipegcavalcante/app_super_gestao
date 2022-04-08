<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
        ->where('site', 'like', '%'.$request->input('site').'%')
        ->where('uf', 'like', '%'.$request->input('uf').'%')
        ->where('email', 'like', '%'.$request->input('email').'%')
        ->paginate(2);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request) {

        $msg = '';

        if($request->input('_token') != '' && $request->input('id') == '' ) {
            //validacao
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];
            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O Campo nome deve ter no minimo 3 caracteres',
                'nome.max' => 'O Campo nome deve ter no maximo 40 caracteres',
                'uf.min' => 'O Campo uf deve ter no minimo 3 caracteres',
                'uf.max' => 'O Campo uf deve ter no maximo 40 caracteres',
                'email.email' => 'O email deve ser preenchido corretamente'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            //redirect

            //dados view
            $msg = 'Cadastro realizado com sucesso';
        }

        if($request->input('_token') != '' && $request->input('id') != '' ) {

            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if ($update) {
                $msg =  'sucesso ao atualizar';
            } else {
                $msg =  'erro ao atualizar';
            }

            return redirect()->route('app.fornecedor.adicionar',['id' => $request->input('id'), 'msg' => $msg]);
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = '') {

        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor]);

    }

    public function excluir($id) {

        $fornecedor = Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor');

    }
}
