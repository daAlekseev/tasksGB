@extends('layouts.app')

@section('title', 'Новости')

@section('content')
    @if($news)
        <h4>{{$news['title']}}</h4>
        <p>{{$news['text']}}</p>
    @else
        <p>Такой новости не существует!</p>
    @endif
    <br><a href="{{URL::previous()}}">Назад</a>
@endsection
