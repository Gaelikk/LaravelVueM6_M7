@extends('modal')
@section('content')
    <div id="app">
        <create-games></create-games>
    </div>
    <script src="{{mix('js/app.js')}}" defer></script>
@endsection
