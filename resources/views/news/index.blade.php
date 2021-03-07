@extends('layouts.app')

@section('title', 'Новости')

@section('content')
    <h3>Все новости</h3>
    <a href="{{route('news.categories.index')}}">Категории новостей</a>
    @foreach($news as $item)
        <h4>{{$item->title}}</h4>
        @if(!$item->isPrivate)
            <a href="{{route('news.item', ['id' => $item->id])}}">Подробнее</a>
        @endif
        <p>{{$item->image}}</p>
        @if($item->image)
            <img class="img-fluid" src="{{url(htmlspecialchars($item->image))}}">
        @else
            <img class="img-fluid" src="{{url(asset('storage/def.jpg'))}}">
        @endif
    @endforeach
@endsection

