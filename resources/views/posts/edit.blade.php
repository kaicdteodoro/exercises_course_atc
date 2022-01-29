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
@if(isset($post))
    <form action="{{route('posts.update', $post)}}" method="post">
        @csrf
        <input type="text" class="form-item" name="title" placeholder="Título" value="{{$post->title}}">
        <input type="text" class="form-item" name="content" placeholder="Conteúdo" value="{{$post->content}}">
        <button type="submit" class="btn">Enviar</button>
    </form>
@endif
</body>
</html>
