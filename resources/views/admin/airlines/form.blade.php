@extends('admin.adminCore')

@section('content')
    <div id = "page-content">
        {!! Form::open(['url' => $rec]) !!}
        @if(isset($record['id']))
            <h2>Edit: {{$record['name']}}</h2>
            <div class="form-group">
                {{Form::label('name', 'Airline name')}}
                {{Form::text('name', $record['name'])}}
            </div>
            <a class="btn btn-primary" href="{{$back}}">Back</a>
            {{Form::submit(('Save'), ['class' => 'btn btn-success']) }}
        @else
            <h2>{{$title}}</h2>
            <div class="form-group">
                {{Form::label('name', 'Airline name')}}
                {{Form::text('name')}}
            </div>
            <a class="btn btn-primary" href="{{$back}}">Back</a>
            {{Form::submit(('Save'), ['class' => 'btn btn-success']) }}
        @endif
    </div>


@endsection