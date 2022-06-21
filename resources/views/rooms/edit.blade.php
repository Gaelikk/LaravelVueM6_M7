@extends('modal')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container d-flex justify-content-center mt-5">
        <div class="col-5 bg-light border rounded">
            <div class="row p-3">
                <h2 class="text-center my-2">Edita sala</h2>
                <form method="POST" action="{{url("/rooms/update/$room->id")}}">
                    @csrf
                    <div class="mb-3">
                        <label for="name">Nom</label>
                        <input id="name" class="form-control @error('name') is-invalid @enderror" name="name"
                               type="text" value="{{$room->name}}">
                        @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="organization">Organització</label>
                        <input id="organization" class="form-control @error('organization') is-invalid @enderror"
                               name="organization" type="text" value="{{$room->organization}}">
                        @error('organization')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image">URL Imatge</label>
                        <input id="image" class="form-control @error('image') is-invalid @enderror" name="image"
                               type="text" value="{{$room->image}}">
                        @error('image')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="game">Joc:</label>
                            <select id="name" class="form-select" name="game">
                                @foreach($games as $game)
                                    <option value="{{ $game->name }}"
                                            @if($game->name) selected @endif>{{ $game->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col mt-4">
                            <input class="btn btn-primary" type="submit" value="Guardar">
                            <a class="btn btn-danger" href={{url('/rooms')}} type="button">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
