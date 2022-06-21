@extends('modal')
@section('content')
    <div id="app">
        <games-component></games-component>
    </div>
    <script src="{{mix('js/app.js')}}" defer></script>
@endsection
