@extends('layouts.base')
@section('titulo', 'Registro de Estúdio')

@section('conteudo')
    <h2>{{$usno}} registrado com sucesso!</h2>

    <a href="{{route('PaginaInicial')}}">Voltar</a>   
@endsection