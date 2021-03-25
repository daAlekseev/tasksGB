@extends('layouts.app')

@section('title', 'CRUD')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if($link->id)
                    <div class="card-header">Изменить новостную ссылку</div>
                @else
                    <div class="card-header">Новая новостная ссылка</div>
                @endif
                <div class="card-body">
                    <form class="container" method="post" @if($link->id) action="{{ route('admin.links.update', $link) }}"
                          @else action="{{ route('admin.links.store') }}" @endif
                          enctype="multipart/form-data">
                        @csrf
                        @if($link->id)
                            @method('PUT')
                        @endif
                        @error('rssLink')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{$message}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Rss ссылка</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                   placeholder="link" name="rssLink" value="{{old('rssLink') ?? $link->rssLink}}">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">@if(!$link->id)Создать@elseИзменить@endif</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
