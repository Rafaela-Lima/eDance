@extends('layouts.base')
@section('titulo', 'Matricula de aluno')

@section('conteudo')
    <h2>Matrícula de {{$usno}} realizada com sucesso!</h2>

    <a href="{{route('PaginaInicial')}}">Voltar</a>   
@endsection