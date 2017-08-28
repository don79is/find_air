@extends('admin.adminCore')
@section('content')
    <div class="form">
        {!! Form::open(['url' => $rec]) !!}
        @if(isset($record['id']))
            <h2>Edit: {{$record['name']}}</h2>
            <div class="form-group">
                {{Form::label('origin', 'Origin')}}
                {{Form::select('origin',$origin, $record['orgin_id'])}}

                {{Form::label('destination', 'Destination')}}
                {{Form::select('destination',$destination, $record['destintation_id'])}}

                {{Form::label('airline', 'Airline')}}
                {{Form::select('airline',$airline, $record['airline_id'])}}

                {{Form::label('departure', 'Departure')}}
                {{Form::datetime('departure', $record['departure'])}}


                {{Form::label('arrival', 'Arrival')}}
                {{Form::datetime('arrival', $record['arrival'])}}


            </div>

            {{Form::submit(('Save'), ['class' => 'btn btn-success']) }}

        @else
            <h2>{{$title}}</h2>
            <div class="form-group">
                {{Form::label('origin', 'Origin')}}
                {{Form::select('origin',$origin)}}

                {{Form::label('destination', 'Destination')}}
                {{Form::select('destination',$destination)}}

                {{Form::label('airline', 'Airline')}}
                {{Form::select('airline', $airline)}}

                {{Form::label('departure', 'Departure')}}
                {{Form::date('departure', $departure)}}


                {{Form::label('arrival', 'Arrival')}}
                {{Form::date('arrival', $arrival)}}

            </div>

            {{Form::submit(('Save'), ['class' => 'btn btn-success']) }}

            {!! Form::close() !!}

        @endif
    </div>
@endsection