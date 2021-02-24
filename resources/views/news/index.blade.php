@extends('layout')

@section('title', 'Новости')

@section('content')

    <h3>Все новости</h3>
    <a href="{{route('news.categories')}}">Категории новостей</a>
    @foreach($news as $new)
        <h4>{{$new['title']}}</h4>
        <p>{{$new['text']}}</p>
    @endforeach
@endsection

