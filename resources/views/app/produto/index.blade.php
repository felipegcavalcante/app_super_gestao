@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Produto - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 80%; margin-left: auto; margin-right: auto;">
                <table style="border: 1px solid black; border-collapse: collapse;">
                    <thead>
                        <tr style="border: 1px solid black;">
                            <th style="border: 1px solid black;">Nome</th>
                            <th style="border: 1px solid black;">Descrição</th>
                            <th style="border: 1px solid black;">Peso</th>
                            <th style="border: 1px solid black;">Unidade ID</th>
                            <th style="border: 1px solid black;"></th>
                            <th style="border: 1px solid black;"></th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach ($produtos as $produto)
                                <tr style="border: 1px solid black;">
                                    <td style="border: 1px solid black;">{{ $produto->nome }}</td>
                                    <td style="border: 1px solid black;">{{ $produto->descricao }}</td>
                                    <td style="border: 1px solid black;">{{ $produto->peso }}</td>
                                    <td style="border: 1px solid black;">{{ $produto->unidade_id }}</td>
                                    {{-- <td style="border: 1px solid black;"> <a href="{{ route('app.produto.editar', $produto->id) }}">Editar</a></td>
                                    <td style="border: 1px solid black;"> <a href="{{ route('app.produto.excluir', $produto->id) }}">Excluir</a></td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                </table>

                {{ $produtos->appends($request)->links() }}
            </div>
        </div>

    </div>

@endsection
