@extends('layouts.app')
@section('content')
    @php
        $text = null;
        $collor = 'red';
        if (isset($energy)) {
            $ayajin = $energy > 8000;
            $text = $ayajin ? 'Mais de 8000!' : 'Inseto!';
            $color = $ayajin ? 'green' : 'red';
        }
            $text =  $text ?? 'Sem energia para calcular!';
    @endphp
    <h1 style="color: {{$color}}">{{$text}}</h1>
@endsection

