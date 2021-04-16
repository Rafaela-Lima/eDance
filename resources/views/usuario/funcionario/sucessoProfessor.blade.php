@extends('layouts.base')
@section('titulo', 'Vincular Professor à Modalidade')

@section('conteudo')
    <h2>Modalidade de {{$usno}} definida com sucesso!</h2>

    <a href="{{route('PaginaInicial')}}">Voltar</a>   
@endsection