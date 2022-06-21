@extends('modal')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container d-flex justify-content-center mt-5">
        <div class="col-5 bg-light border rounded">
            <div class="row p-3">
                <h2 class="text-center my-2">Login</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" id="email"
                               name="email" type="email" value="{{ old('email') }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password">Contrasenya</label>
                        <input class="form-control @error('password') is-invalid @enderror" id="password"
                               name="password" type="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <input class="btn btn-primary" type="submit" value="Inicar Sessió">
                    <a class="btn btn-danger" href={{url('/menu')}} type="button">Cancelar</a>
                    - o -
                    <a class="btn btn-warning" href={{url('/register')}} type="button">Registre</a>
                </form>
            </div>
        </div>
    </div>
@endsection
