@extends('layouts.app')

@section('title', 'Новости')

@section('content')
    <h3>Все категории</h3>
    @foreach($categories as $cat)
        <a href="{{route('news.categories.categoryById', $cat->slug)}}">{{($cat->title)}}</a>
    @endforeach
    <br><a href="{{URL::previous()}}">Назад</a>
@endsection
