@extends('modal')
@section('content')
    <div class="container">
        <h1 class="text-center my-5">Llista de sales</h1>
        <table class="table table-dark table-bordered">
            <th>Nom</th>
            <th>Organització</th>
            <th>Joc</th>
            @auth
                @if(Auth::user()->isAdmin())
                    <th>Opcions
                        <a class="btn btn-success float-lg-end" href="/rooms/create">Crear Sala</a>
                    </th>
                @endif
            @endauth
            @foreach($rooms as $room)
                <tr>
                    <td>{{$room->name}}</td>
                    <td>{{$room->organization}}</td>
                    <td>{{$room->game}}</td>
                    @auth
                        @if(Auth::user()->isAdmin())
                            <td>
                                <a class="btn btn-primary" href="/rooms/edit/{{$room->id}}">Edita</a>
                                <a class="btn btn-danger" href="/rooms/delete/{{$room->id}}">Elimina</a>
                            </td>
                        @endif
                    @endauth
                </tr>
            @endforeach
        </table>
    </div>
@endsection
