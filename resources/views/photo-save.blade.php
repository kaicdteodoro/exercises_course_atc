@extends('layouts.app')
@section('content')
    <h1>Submit de foto</h1>
    <form action="{{route('photo.store')}}" enctype="multipart/form-data" method="post">
        @csrf
        <input type="file" name="photo">
        <button type="submit">Submit</button>
    </form>
@endsection
