@extends('layouts.base')
@section('titulo', 'Cadastro de aluno')

@section('conteudo')
    <h2>Cadastro de {{$usno}} realizado com sucesso!</h2>

    <a href="{{route('PaginaInicial')}}">Voltar</a>   
@endsection