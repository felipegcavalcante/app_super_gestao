@extends('site.layouts.basico')

@section('titulo', $titulo)
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style='width:30%;margin:auto;'>
                <form action='{{ route('site.login') }}' method='post'>
                    @csrf
                    <input name='usuario' value='{{ old('usuario') }}' type='text' class='borda-preta' placeholder='usuario'><br>
                    {{ $errors->has('usuario') ? $errors->first('usuario') : '' }}
                    <input name='senha' value='{{ old('senha') }}' type='password' class='borda-preta' placeholder='senha'>
                    {{ $errors->has('senha') ? $errors->first('senha') : '' }}
                    <input value='Acessar' type='submit' class='borda-preta'>
                </form>
    {{ isset($erro) && $erro != '' ? "Usuario ou senha incorretos" : '' }}
            </div>
        </div>
    </div>

    @include('site.layouts._partials.rodape')
@endsection