@extends('layouts.app')
@section('content')

    @if(isset($names) && count($names))
        <h1>Nomes:</h1><br>
        @foreach($names as $name)
            <h2> {{$name}} </h2><br>
        @endforeach
    @else
        <h2>Nenhum nome encontrado</h2>
    @endif
@endsection
