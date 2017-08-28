<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Find Air</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaijaan" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Baloo Bhaijaan', cursive;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
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
        <div class="content">
            <div class="title m-b-md">
              Find Air
            </div>


            <div class="form-group">

                {!! Form::open(['method'=>'GET', 'url' => $rec]) !!}

                {{Form::label('from', 'From')}}
                {{Form::select('from',$origin) }}

                {{Form::label('to', 'To')}}
                {{Form::select('to',$destination)}}

                {{Form::label('date', 'Date')}}
                {{Form::date('date', $time)}}

            </div>

            {{Form::submit('Search') }}

            {!! Form::close() !!}

            @if(isset($flights))
                {{--@if(sizeof($flights)>0)--}}
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        @foreach($flights[0] as $key => $value)
                            @if(!in_array($key, $ignore))
                                <th>{{$key}}</th>
                            @endif
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($flights as $flight)
                        @foreach($flight as $key => $value)
                            @if(!in_array($key, $ignore))
                                @if($key == 'origin_airport')
                                    <td>
                                        {{$value['name']}}(Airport),
                                        {{$value['city']}}(City),
                                        {{$value['country_id']}}(Country code)
                                    </td>
                                @elseif($key == 'destination_airport')
                                    <td>
                                        {{$value['name']}}(Airport),
                                        {{$value['city']}}(City),
                                        {{$value['country_id']}}(Country code)
                                    </td>
                                @elseif($key == 'airline')
                                    <td>{{$value['name']}}</td>
                                @else
                                    <td>{{$value}}</td>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                    </tbody>
                </table>


            @endif


        </div>



</div>
</body>
</html>
