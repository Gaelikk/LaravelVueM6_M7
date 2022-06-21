@extends('modal')
@section('content')
    <h1 class="text-center m-4">Benvingut a la sala d'Escaperooms</h1>
    <div class="container pb-5">
        <div id="carouselExampleControls" class="carousel slide w-50 mx-auto" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                @foreach( $books as $book )
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img class="d-block img-fluid" src="{{ $book->image }}" alt="">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </div>
    <div class="row row-cols-2 mb-5">
        @foreach($games as $game)
            <div class="card border-dark">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-6 p-3">
                            <h5 class="card-title">{{$game->id}} - {{$game->name}}</h5>
                            <p class="card-text">{{$game->organization}}</p>
                            <div class="pt-5">
                                <a class="btn btn-warning mb-1" href="/reviews">Valoració</a>
                                @auth
                                    @if(Auth::user()->isAdmin())
                                        <a class="btn btn-success mb-1" href="/books/create">Reserva</a><br>
                                        <a class="btn btn-primary" href="/games/edit/{{$game->id}}">Edita</a>
                                        <a class="btn btn-danger" href="/games/delete/{{$game->id}}">Elimina</a>
                                    @endif
                                @endauth
                            </div>
                        </div>
                        <div class="col-6 pe-0">
                            <img alt="" height="100%" class="img-fluid" src="{{$game->image}}">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
