{{-- @extends('layouts.app')


@section('content')

<h1>Benvenuto</h1>
@endsection --}}
{{-- @yield presente in app.blade.php (al fondo) --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Front Office</title>
</head>
<body>

{{-- id che linka vue --}}
    <div id="root">

    </div>
{{-- link al file js di laravel --}}
<script src="{{ asset('js/app.js') }}" ></script>
</body>
</html>
