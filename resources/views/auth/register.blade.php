@extends('modal')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container d-flex justify-content-center mt-5">
        <div class="col-5 bg-light border rounded">
            <div class="row p-3">
                <h2 class="text-center my-2">Registre</h2>
                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Nom</label>
                            <input autocomplete="name" class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name" type="text" value="{{ old('name') }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="surname">Cognom</label>
                            <input autocomplete="surname"
                                   class="form-control @error('surname') is-invalid @enderror" id="surname"
                                   name="surname" type="text" value="{{ old('surname') }}">
                            @error('surname')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input autocomplete="email" class="form-control @error('email') is-invalid @enderror"
                               id="email" name="email" type="email" value="{{ old('email') }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="username">Nom d'usuari</label>
                        <input autocomplete="username" class="form-control @error('username') is-invalid @enderror"
                               id="username" name="username" type="text" value="{{ old('username') }}">
                        @error('username')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password">Contrasenya</label>
                        <input autocomplete="password" class="form-control @error('password') is-invalid @enderror"
                               id="password" name="password" type="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <input class="btn btn-primary" type="submit" value="Registrar">
                    <a class="btn btn-danger" href={{url('/menu')}} type="button">Cancelar</a>
                    - o -
                    <a class="btn btn-warning" href={{url('/login')}} type="button">Inicar Sessió</a>
                </form>
            </div>
        </div>
    </div>
@endsection
