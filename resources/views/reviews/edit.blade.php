<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit review</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<a class="" href="/reviews">Llista</a>
<div class="" style="height: 370px">
    <div class="">
        <p>review del game</p>
    </div>
    <div class="">
        <form method="POST" action="{{url("/reviews/update/$review->id")}}">
            @csrf
            <input class="" type="text" id="roomName" name="reserva" hidden value="{!! $review->reserva !!}"><br>
            <input class="" style="height: 50px" type="text" id="roomImage" name="comment"
                   value="{!! $review->comment !!}"><br>
            <input class="" type="text" id="username" name="username" hidden value="{!! $review->username !!}"><br>
            <input class="btn btn-primary" type="submit" value="Guardar">
        </form>
    </div>
</div>
</body>
</html>
