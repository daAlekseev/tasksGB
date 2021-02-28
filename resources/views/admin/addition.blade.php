@extends('layouts.app')

@section('title', 'Создание новости')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Новая новость</div>

                <div class="card-body">
                    <form class="container">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Заголовок</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                   placeholder="Заголовок новости">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Категория</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>Спорт</option>
                                <option>Политика</option>
                                <option>Искусство</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Текст</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="8"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Создать</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
