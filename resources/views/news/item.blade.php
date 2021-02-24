@extends('layout')

@section('title', 'Новости')

@section('content')
    @foreach($news as $new)
        <h4>{{$new['title']}}</h4>
        <p>{{$new['text']}}</p>
    @endforeach
    <br><a href="{{URL::previous()}}">Назад</a>
@endsection
