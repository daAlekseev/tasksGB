@extends('layouts.app')

@section('title', 'Новости')

@section('content')
    @if($news)
        @foreach($news as $item)
            @if (!$item->isPrivate)
                <h2>{{ $item->title }}</h2>
                <p>{{ $item->text }}</p>
            @else
                Зарегистрируйтесь для просмотра
            @endif
        @endforeach
    @else
        <p>Такой новости не существует!</p>
    @endif
    <br><a href="{{URL::previous()}}">Назад</a>
@endsection
