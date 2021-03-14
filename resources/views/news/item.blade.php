@extends('layouts.app')

@section('title', 'Новости')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>{{ $news->title }}</h2>
                        <p>{{ $news->text }}</p>
                        @if($news->image)
                            <img class="img-fluid" src="{{url(htmlspecialchars($news->image))}}">
                        @else
                            <img class="img-fluid" src="{{url(asset('storage/def.jpg'))}}">
                        @endif
                        <br><a href="{{URL::previous()}}">Назад</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
