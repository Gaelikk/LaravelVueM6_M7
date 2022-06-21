@extends('modal')
@section('content')
    <div class="container">
        <h1 class="text-center my-5">Vista de Reserves</h1>
        <table class="table table-dark table-bordered">
            <th>Usuari</th>
            <th>Número tlf.</th>
            <th>País</th>
            <th>Sala</th>
            <th>Joc</th>
            <th>Data</th>
            @auth
                <th>Opcions
                    <a class="btn btn-success float-lg-end" href="{{url("/books/create/$user->id")}}">Crear Reserva</a>
                </th>
            @endauth
            @foreach($books as $book)
                <tr>
                    <td>{{$book->user}}</td>
                    <td>{{$book->phone}}</td>
                    <td>{{$book->country}}</td>
                    <td>{{$book->room}}</td>
                    <td>{{$book->game}}</td>
                    <td>{{$book->date}}</td>
                    @auth
                        <td><a class="btn btn-primary" href="/books/edit/{{$book->id}}">Edita</a>
                            <a class="btn btn-danger" href="/books/delete/{{$book->id}}">Elimina</a>
                        </td>
                    @endauth
                </tr>
            @endforeach
        </table>
    </div>
@endsection
