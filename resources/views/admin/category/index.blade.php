@extends('layouts.app')

@section('title', 'Режим админа')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Новая категория</h2>
                        <a class="btn btn-secondary" href="{{ route('admin.category.create') }}">Создать</a>
                        <h2>Редактирование</h2>
                        @forelse($category as $item)
                            <p>Категория: <a href="{{route('admin.category.show', $item->id)}}">{{ $item->title }}</a>
                            </p>
                            <form action="{{ route('admin.category.destroy', $item) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-secondary" href="{{ route('admin.category.edit', $item) }}">Редактировать</a>
                                <input type="submit" class="btn close" value="x">
                            </form>
                        @empty
                            <p>Нет новостей</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
