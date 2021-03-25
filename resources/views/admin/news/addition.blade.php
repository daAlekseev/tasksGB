@extends('layouts.app')

@section('title', 'Создание новости')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Новая новость</div>
                <div class="card-body">
                    <form class="container" method="post"
                          @if($news->id) action="{{ route('admin.news.update', $news) }}"
                          @else action="{{ route('admin.news.store') }}" @endif
                          enctype="multipart/form-data">
                        @csrf
                        @if($news->id)
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
                            <label for="exampleFormControlInput1">Заголовок</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                   placeholder="Заголовок новости" name="title"
                                   value="{{old('title') ?? $news->title}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Категория</label>
                            <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                                @forelse($categories as $category)
                                    @if (old('category_id'))
                                        <option @if ($category->id == old('category_id')) selected
                                                @endif value="{{ $category->id }}">{{ $category->title }}
                                    @else
                                        <option @if ($category->id == $news->category_id) selected
                                                @endif value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endif
                                @empty
                                    <option value="0">Категории нет</option>
                                @endforelse
                            </select>
                        </div>
                        @error('text')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{$message}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Текст</label>
                            <textarea name="text" class="form-control"
                                      id="my-editor"
                                      rows="8">{!! empty(old('text')) ? $news->text : old('text') !!}</textarea>
                            <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                            <script>
                                var options = {
                                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                                };
                            </script>
                            <script>
                                CKEDITOR.replace('my-editor', options);
                            </script>
                        </div>

                        <div class="form-check">
                            <input @if ($news->isPrivate == 1 || old('isPrivate'))) checked
                                   @endif name="isPrivate" type="checkbox" value="1"
                                   class="form-check-input">
                            <label for="newsPrivate">Приватная</label>
                        </div>
                        @error('image')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{$message}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                        <div class="form-group">
                            <input type="file" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">@if(!$news->id)Создать@else
                                Изменить@endif</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
