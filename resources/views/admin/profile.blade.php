@extends('layouts.app')

@section('title', 'Режим админа')

@section('script')
    <script>
        function clickCheck(id, event) {
            event.preventDefault()
            $.ajax({
                url: '{{route('admin.profile')}}',
                type: 'POST',
                data: {id: id},
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if ($('#' + id).attr('value') == 1)
                        $('#p' + id).html('<p>Роль: 0</p>');
                    else
                        $('#p' + id).html('<p>Роль: 1</p>');
                },
                error: function () {
                    alert('Ошибка');
                }
            });
        }
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="container" method="post" action="{{route('admin.profile')}}">
                            @csrf
                            @forelse($users as $user)
                                {{--                               @if(!$user->isAdmin)--}}

                                <p>id: {{$user->id}}</p>
                                <p>Имя: {{$user->name}}</p>
                                <p>E-mail: {{$user->email}}</p>
                                <p id="p{{$user->id}}"">Роль: {{$user->isAdmin}}</p>
                                <button id="{{$user->id}}" name="id"
                                        value="{{$user->isAdmin}}" onclick="clickCheck({{$user->id}}, event)"
                                        type="submit" class="btn btn-primary mb-2">Сменить роль
                                </button>

                                {{--                                @endif--}}

                            @empty
                                <p>Нет пользователей</p>
                            @endforelse
                            <p>{{ $users->links() }}</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
