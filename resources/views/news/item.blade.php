@extends('layouts.app')

@section('title', 'Новости')

@section('content')
    @if($news)
        @if (!$news['isPrivate'])
            <h2>{{ $news['title'] }}</h2>
            <p>{{ $news['text'] }}</p>
        @else
            Зарегистрируйтесь для просмотра
        @endif
    @else
        <p>Такой новости не существует!</p>
    @endif
    <br><a href="{{URL::previous()}}">Назад</a>
@endsection
