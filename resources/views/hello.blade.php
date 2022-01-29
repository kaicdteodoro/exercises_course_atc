@extends('layouts.app')
@section('content')
    @php
        $text = isset($name) ? "Olá, $name" : "Nenhum nome encontrado!";
        $color = isset($name) ? 'green' : 'red';
    @endphp
    <h1 style="color: {{$color}}">{{$text}}</h1>
@endsection
