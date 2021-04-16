@extends('layouts.base')
@section('titulo', 'Registro de Modalidade')

@section('conteudo')
    <h2>Modalidade {{$usno}} registrada com sucesso!</h2>

    <a href="{{route('PaginaInicial')}}">Voltar</a>   
@endsection