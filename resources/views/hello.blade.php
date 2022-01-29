<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@php
    $text = isset($name) ? "Olá, $name" : "Nenhum nome encontrado!";
    $color = isset($name) ? 'green' : 'red';
@endphp
<h1 style="color: {{$color}}">{{$text}}</h1>
</body>
</html>
