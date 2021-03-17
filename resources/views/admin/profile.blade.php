@extends('layouts.app')

@section('title', 'Режим админа')

@section('script')
    <script>
        function clickCheck(id, event){
            event.preventDefault()
            $.ajax({
                url: '{{route('admin.profile')}}',
                type: 'POST',
                data: {id:id},
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    $('#id' + id).hide();
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
                               @if(!$user->isAdmin)
                                   <div id="id{{$user->id}}">
                                       <p>id: {{$user->id}}</p>
                                       <p>Имя: {{$user->name}}</p>
                                       <p>E-mail: {{$user->email}}</p>
                                       <p>Роль: {{$user->isAdmin}}</p>
                                       <button id="{{$user->id}}" name="id"
                                               value="{{$user->id}}" onclick="clickCheck({{$user->id}}, event)"
                                               type="submit" class="btn btn-primary mb-2">Сменить роль</button>
                                   </div>
                                @endif

                            @empty
                                    <p>Нет пользователей</p>
                            @endforelse
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
