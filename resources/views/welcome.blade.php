<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
    @endif
    <div id="search">
        <h2>Search</h2>
        <div class="form-group">
            {!! Form::open(['url' => $rec,'method'=> 'GET']) !!}
            {{Form::label('origin', 'From')}}
            {{Form::select('origin',$origin)}}

            {{Form::label('destination', 'To')}}
            {{Form::select('destination',$destination)}}<br>


            {{Form::date('departure', $time)}}

            {{Form::submit('Search')}}
            {{--{{Form::label('arrival', 'Arrival')}}--}}
            {{--{{Form::datetime('arrival', $arrival)}}--}}

        </div>
        @if(isset($flights))
            @foreach($flights as $key=> $value )
                {{$key}}

            @endforeach
        @endif
    </div>
</div>
</body>
</html>
