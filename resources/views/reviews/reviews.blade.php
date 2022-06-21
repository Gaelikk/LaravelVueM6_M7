@extends('modal')
@section('content')
    <div class="container">
        <h1 class="text-center my-5">Llista de Valoracions</h1>
        <table class="table table-dark table-bordered">
            <th>Usuari</th>
            <th>Comentari</th>
            <th>Joc</th>
            <th>Valoració</th>
            @auth
                <th>Opcions
                    <a class="btn btn-success float-lg-end" href="{{url("/reviews/create/$user->id")}}">Crear Valoració</a>
                </th>
            @endauth
            @foreach($reviews as $review)
                <tr>
                    <td>{{$review->user}}</td>
                    <td>{{$review->comment}}</td>
                    <td>{{$review->game}}</td>
                    <td>{{$review->rating}}/5</td>
                    @auth
                    <td>
                        <a class="btn btn-danger mr-2" href="/reviews/delete/{{$review->id}}">Elimina</a>
                    </td>
                    @endauth
                </tr>
            @endforeach
        </table>
    </div>
    </div>
@endsection
