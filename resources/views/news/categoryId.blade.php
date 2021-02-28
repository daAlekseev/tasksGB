@extends('layouts.app')

@section('title', 'Новости')

@section('content')
    @if($news)
        @foreach($news as $item)
            <a href="{{route('news.categories.item', ['key' => $item['slug'],'id' => $item['id']])}}">{{$item['title']}}</a>
        @endforeach
    @else
        <p>Такой категории не существует!</p>
    @endif
    <br><a href="{{URL::previous()}}">Назад</a>
@endsection
