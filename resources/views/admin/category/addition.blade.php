@extends('layouts.app')

@section('title', 'Создание новости')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if($category->id)
                    <div class="card-header">Изменить категорию</div>
                @else
                    <div class="card-header">Новая категория</div>
                @endif
                <div class="card-body">
                    <form class="container" method="post" @if($category->id) action="{{ route('admin.category.update', $category) }}"
                          @else action="{{ route('admin.category.store') }}" @endif
                          enctype="multipart/form-data">
                        @csrf
                        @if($category->id)
                            @method('PUT')
                        @endif
                        @error('title')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{$message}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Наименование категории</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                   placeholder="title" name="title" value="{{old('title') ?? $category->title}}">
                        </div>
                        @error('slug')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{$message}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Slug для категории</label>
                            <input type="text" class="form-control" id="exampleFormControlInput2"
                                   placeholder="slug" name="slug" value="{{old('slug') ?? $category->slug}}">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">@if(!$category->id)Создать@elseИзменить@endif</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
