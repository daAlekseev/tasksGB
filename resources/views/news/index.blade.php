@extends('layouts.app')

@section('title', 'Новости')

@section('content')
    <h3>Все новости</h3>
    <a href="{{route('news.categories.index')}}">Категории новостей</a>
    @foreach($news as $item)
        <h4>{{$item['title']}}</h4>
        @if(!$item['isPrivate'])
        <a href="{{route('news.categories.item', ['key' => $item['slug'],'id' => $item['id']])}}">Подробнее</a>
        @endif
    @endforeach
@endsection

