@extends('layouts.app')

@section('title', 'Режим админа')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Новая новостная ссылка</h2>
                        <a class="btn btn-secondary" href="{{route('admin.links.create')}}">Создать</a>
                        <h2>Редактирование</h2>
                        @forelse($links as $item)
                            <a href="{{$item->rssLink}}">{{$item->rssLink}}</a>
                            <form action="{{ route('admin.links.destroy', $item) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-secondary" href="{{ route('admin.links.edit', $item) }}">Редактировать</a>
                                <input type="submit" class="btn close" value="x">
                            </form>
                        @empty
                            <p>Нет новостных ссылок!</p>
                        @endforelse
{{--                        <p>{{ $news->links() }}</p>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
