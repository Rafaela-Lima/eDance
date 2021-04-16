@extends('layouts.base')
@section('titulo', 'Registro de Turma')

@section('conteudo')
    <h2> {{$usno}} registrada com sucesso!</h2>

    <a href="{{route('PaginaInicial')}}">Voltar</a>   
@endsection