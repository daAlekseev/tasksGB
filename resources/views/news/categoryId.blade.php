@extends('layout')

@section('title', 'Новости')

@section('content')
@foreach($news as $item)
    <a href="{{route('news.item', ['key' => $item['key'],'id' => $item['id']])}}">{{$item['title']}}</a>
@endforeach
<br><a href="{{URL::previous()}}">Назад</a>
@endsection
