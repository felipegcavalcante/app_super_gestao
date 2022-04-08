@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Fornecedor - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 80%; margin-left: auto; margin-right: auto;">
                <table style="border: 1px solid black; border-collapse: collapse;">
                    <thead>
                        <tr style="border: 1px solid black;">
                            <th style="border: 1px solid black;">Nome</th>
                            <th style="border: 1px solid black;">Site</th>
                            <th style="border: 1px solid black;">Uf</th>
                            <th style="border: 1px solid black;">Email</th>
                            <th style="border: 1px solid black;"></th>
                            <th style="border: 1px solid black;"></th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach ($fornecedores as $fornecedor)
                                <tr style="border: 1px solid black;">
                                    <td style="border: 1px solid black;">{{ $fornecedor->nome }}</td>
                                    <td style="border: 1px solid black;">{{ $fornecedor->site }}</td>
                                    <td style="border: 1px solid black;">{{ $fornecedor->uf }}</td>
                                    <td style="border: 1px solid black;">{{ $fornecedor->email }}</td>
                                    <td style="border: 1px solid black;"> <a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Editar</a></td>
                                    <td style="border: 1px solid black;"> <a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}">Excluir</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>

                {{ $fornecedores->appends($request)->links() }}
            </div>
        </div>

    </div>

@endsection
