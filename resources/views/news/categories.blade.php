@extends('layout')

@section('title', 'Новости')

@section('content')
    <h3>Категории новостей</h3>
    @foreach($categories as $cat)
    <a href="{{route('news.categoryId', $cat['key'])}}">{{($cat['title'])}}</a>
    @endforeach
    <br><a href="{{URL::previous()}}">Назад</a>
@endsection
