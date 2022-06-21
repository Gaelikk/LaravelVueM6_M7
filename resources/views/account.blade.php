@extends('modal')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container d-flex justify-content-center mt-5">
        <div class="col-5 bg-light border rounded">
            <div class="row p-3">
                <h2 class="text-center my-2">Panell de control de la conta</h2>
                <form method="POST" action="{{url("/users/update/$user->id")}}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name">Nom</label>
                            <input class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                   type="text" value="{{$user->name}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="surname">Cognom</label>
                            <input class="form-control @error('surname') is-invalid @enderror" id="surname"
                                   name="surname"
                                   type="text" value="{{$user->surname}}">
                            @error('surname')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input autocomplete="email" class="form-control"
                               id="email" name="email" type="email" value="{{$user->email}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="username">Nom d'usuari</label>
                        <input autocomplete="username" class="form-control @error('username') is-invalid @enderror"
                               id="username" name="username" type="text" value="{{$user->username}}">
                        @error('username')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password">Contrasenya</label>
                        <input autocomplete="password" class="form-control @error('password') is-invalid @enderror"
                               id="password" name="password" type="password" value="{{$user->password}}">
                        @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <input class="btn btn-success" type="submit" value="Guardar canvis">
                    <a class="btn btn-danger" href={{url('/users')}} type="button">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
