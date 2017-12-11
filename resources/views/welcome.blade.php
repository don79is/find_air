<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Find Air</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaijaan" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen"
          href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <link href="/css/prettify-1.0.css" rel="stylesheet">
    <link href="/css/base.css" rel="stylesheet">
    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css"
          rel="stylesheet">


    <link href="/css/app.css" rel=stylesheet>
    <link href="/css/adminStyle.css" rel=stylesheet>
    <!-- Styles -->
    <style>
        html, body {
            background-image: url("http://wallpapers-and-backgrounds.net/wp-content/uploads/2016/01/airplane-full-hd-wallpaper_1_1920x1200.jpg");
            /*color: #636b6f;*/

            /*font-weight: 100;*/
            /*height: 100vh;*/
            /*margin: 0;*/
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

        button, html input[type=button], input[type=reset], input[type=submit] {
            margin-bottom: 100px;
        }

        .m-b-md {
            color: white;
            font-family: 'Baloo Bhaijaan', cursive;
            margin-bottom: 30px;
        }
        select {
            display: block;
            height: 4rem;
            width: 50%;
            padding: .5rem .75rem;
            font-size: 1.75rem;
            line-height: 1.25;
            color: #464a4c;
            background-color: #fff;
            background-image: none;
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, .15);
            border-radius: .25rem;
            -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        }
        input {
            display: block;
            height: 4rem;
            width: 50%;
            padding: .5rem .75rem;
            font-size: 1.75rem;
            line-height: 1.25;
            color: #464a4c;
            background-color: #fff;
            background-image: none;
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, .15);
            border-radius: .25rem;
            -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
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

        <div class="page-content">

            <div class="container">

                <div class="title m-b-md">Find Air</div>

                <form action="{{ route('app.search.index')}}" method="get">
                    {{--{!! Form::open(['method'=>'GET', 'url' => $rec]) !!}--}}

                    <div class="form-group">
                        <label>Departure airport</label>
                        {{Form::select('from',$origin) }}
                    </div>
                    <div class="form-group">
                        <label>Arrival airport</label>
                        {{Form::select('to',$destination)}}
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        {{Form::date('date', $time)}}
                    </div>

                    <button type="submit" class="btn btn-info">Search</button>

                </form>

                @if(isset($flights))
                    {{--@if(sizeof($flights)>0)--}}
                    <table class="table table-bordered ">
                        <thead class="thead-inverse">
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

                                        </td>
                                    @elseif($key == 'destination_airport')
                                        <td>
                                            {{$value['name']}}(Airport),
                                            {{$value['city']}}(City),

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
    </div>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>--}}
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
</html>
