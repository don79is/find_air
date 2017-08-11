@extends('admin.adminCore')

@section('content')
    {!! Form::open(['url' => $rec]) !!}
    @if(isset($record['id']))
        <h2>Edit: {{$record['name']}}</h2>
        <div class="form-group">
            {{Form::label('name', 'Airport name')}}
            {{Form::text('name', $record['name'])}}
            {{Form::label('name', 'Airport id')}}
            {{Form::text('name', $record['id'])}}
            {{Form::label('city', 'City')}}
            {{Form::text('city', $record['city'])}}
            {{Form::label('country_id', 'Country name')}}
            {{Form::select('country_id',$country, $record['country_id'])}}
        </div>
        <a class="btn btn-primary" href="{{$back}}">Back</a>
        {{Form::submit(('Save'), ['class' => 'btn btn-success']) }}
    @else
        <h2>{{$title}}</h2>
        <div class="form-group">
            {{Form::label('name', 'Airport name')}}
            {{Form::text('name')}}<br>
            {{Form::label('city', 'City')}}
            {{Form::text('city')}}<br>
            {{Form::label('id', 'id')}}
            {{Form::text('id')}}<br>
            {{Form::label('country_id', 'Country name')}}
            {{Form::select('country_id',$country)}}


        </div>
    @endif
    <a class="btn btn-primary" href="{{$back}}">Back</a>
    {{Form::submit(('Save'), ['class' => 'btn btn-success']) }}





@endsection