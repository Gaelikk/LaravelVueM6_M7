@extends('modal')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container d-flex justify-content-center mt-5">
        <div class="col-5 bg-light border rounded">
            <div class="row p-3">
                <h2 class="text-center my-2">Afegir Valoració</h2>
                <form method="POST" action="{{url("/reviews/store/$user->id")}}">
                    @csrf
                    <label for="user">Usuari</label>
                    <input id="user" class="form-control mb-3" name="user" readonly type="text" value="{{$user->name}}">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="game">Selecciona el joc a valorar</label>
                            <select id="game" class="form-select mb-3" name="game">
                                @foreach($games as $game)
                                    <option value="{{ $game->name }}" @if($game->name) selected @endif>
                                        {{$game->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="rating">Valora amb punts</label>
                            <select id="rating" class="form-select mb-3" name="rating">
                                <option value="1">1 (Malament)</option>
                                <option value="2">2 (Decent)</option>
                                <option value="3">3 (Bé)</option>
                                <option value="4">4 (Molt bé)</option>
                                <option value="5">5 (Excelent)</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="comment">Comentari</label>
                        <textarea id="comment" class="form-control @error('comment') is-invalid @enderror" rows="5"
                                  name="comment" type="text" value="{{ old('comment') }}"></textarea>
                        @error('comment')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <input class="btn btn-primary" type="submit" value="Guardar">
                    <a class="btn btn-danger" href={{url('/reviews')}} type="button">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection

