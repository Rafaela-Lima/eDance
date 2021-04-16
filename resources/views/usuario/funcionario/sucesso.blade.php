@extends('layouts.base')
@section('titulo', 'Cadastro de usuário')

@section('conteudo')
    <h2>{{$usno}} seu cadastro foi realizado com sucesso!</h2>

    <a href="{{route('PaginaInicial')}}">Voltar</a>   
@endsection