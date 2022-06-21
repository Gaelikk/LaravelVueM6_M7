@extends('modal')
@section('content')
    <div id="app">
        <users-component></users-component>
    </div>
    <script src="{{mix('js/app.js')}}" defer></script>
@endsection
