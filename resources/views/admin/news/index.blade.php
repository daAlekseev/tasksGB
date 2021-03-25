@extends('layouts.app')

@section('title', 'Режим админа')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Новая новость</h2>
                        <a class="btn btn-secondary" href="{{ route('admin.news.create') }}">Создать</a>
                        <h2>Редактирование</h2>
                        @forelse($news as $item)
                            <p>Новость: <a href="{{route('admin.news.show', $item->id)}}">{{ $item->title }}</a></p>
                            <p>Категория: {{$item->category->title}}</p>
                            <form action="{{ route('admin.news.destroy', $item) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-secondary" href="{{ route('admin.news.edit', $item) }}">Редактировать</a>
                                <input type="submit" class="btn close" value="x">
                            </form>
                        @empty
                            <p>Нет новостей</p>
                        @endforelse
                        <p>{{ $news->links() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

