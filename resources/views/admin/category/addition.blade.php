@extends('layouts.app')

@section('title', 'Создание новости')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Новая категория</div>
                <div class="card-body">
                    <form class="container" method="post" @if($category->id) action="{{ route('admin.category.update', $category) }}"
                          @else action="{{ route('admin.category.store') }}" @endif
                          enctype="multipart/form-data">
                        @csrf
                        @if($category->id)
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Наименование категории</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                   placeholder="title" name="title" value="{{old('title') ?? $category->title}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Slug для категории</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                   placeholder="slug" name="slug" value="{{old('slug') ?? $category->slug}}">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">@if(!$category->id)Создать@elseИзменить@endif</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
