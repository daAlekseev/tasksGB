@extends('layouts.app')

@section('title', 'Новости')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Все новости</h3>
                        <a href="{{route('news.categories.index')}}">Категории новостей</a>
                        @foreach($news as $item)
                            <h4>{{$item->title}}</h4>
                            @if(!$item->isPrivate || $user)
                                <a href="{{route('news.item', $item->id)}}">Подробнее</a>
                            @endif
                            @if($item->image)
                                <img class="img-fluid" src="{{url(htmlspecialchars($item->image))}}">
                            @else
                                <img class="img-fluid" src="{{url(asset('storage/def.jpg'))}}">
                            @endif
                        @endforeach
                        <p>{{ $news->links() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

