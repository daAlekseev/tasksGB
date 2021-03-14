@extends('layouts.app')

@section('title', 'Новости')

@section('content')
    @if($news)
        @foreach($news as $item)
            @if(!$item['isPrivate'])
                <a href="{{route('news.item', $item->id)}}">
                    {{$item['title']}}</a>
            @endif
        @endforeach
    @else
        <p>Такой категории не существует!</p>
    @endif
    <br><a href="{{URL::previous()}}">Назад</a>
@endsection
