@extends('layouts.app')

@section('title', 'Профиль')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Изменение данных</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile') }}">
                            @csrf
                            @error('email')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{$message}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleFormControlInput">Новая почта</label>
                                <input type="text" class="form-control"
                                       name="email" id="exampleFormControlInput1" value="{{old('email') ?? $user->email}}">
                            </div>
                            @error('name')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{$message}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleFormControlInput">Новое имя</label>
                                <input type="text" class="form-control"
                                       name="name" id="exampleFormControlInput1" value="{{old('name') ?? $user->name}}">
                            </div>
                            @error('password')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{$message}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleFormControlInput2">Старый пароль</label>
                                <input type="password" class="form-control" id="exampleFormControlInput2"
                                       name="password">
                            </div>
                            @error('newPassword')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{$message}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleFormControlInput3">Новый пароль</label>
                                <input type="password" class="form-control" id="exampleFormControlInput3"
                                       name="newPassword">
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Подтвердить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
