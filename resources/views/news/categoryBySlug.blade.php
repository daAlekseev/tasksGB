@extends('layouts.app')

@section('title', 'Новости')

@section('content')
    <h3>Новости категории:</h3>
    @if($news)
        @foreach($news as $item)
            @if(!$item['isPrivate'] || $user)
                <a href="{{route('news.item', $item->id)}}">
                    {{$item['title']}}</a>
            @endif
        @endforeach
    @else
        <p>Такой категории не существует!</p>
    @endif
    <br><a href="{{URL::previous()}}">Назад</a>
@endsection
