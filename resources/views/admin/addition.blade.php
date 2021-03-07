@extends('layouts.app')

@section('title', 'Создание новости')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Новая новость</div>
                <div class="card-body">
                    <form class="container" method="post" action="{{ route('admin.addition') }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Заголовок</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                   placeholder="Заголовок новости" name="title" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Категория</label>
                            <select name="catId" class="form-control" id="exampleFormControlSelect1">
                                @forelse($categories as $category)
                                    <option @if ($category->id == old('category')) selected
                                            @endif value="{{$category->id}}">{{$category->title}}</option>
                                @empty
                                    <option value="0">Категории нет</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Текст</label>
                            <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="8">{{old('text')}}</textarea>
                        </div>
                        <div class="form-check">
                            <input @if (old('isPrivate')) checked
                                   @endif name="isPrivate" type="checkbox" value="1"
                                   class="form-check-input">
                            <label for="newsPrivate">Приватная</label>
                        </div>
                        <div class="form-group">
                            <input type="file" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Создать</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
