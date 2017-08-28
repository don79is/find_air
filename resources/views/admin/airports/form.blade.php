@extends('admin.adminCore')

@section('content')
    <div class="form">
        {!! Form::open(['url' => $rec]) !!}
        @if(isset($record['id']))
            <h2>Edit: {{$record['name']}}</h2>
            <div class="form-group">
                {{Form::label('name', 'Airport name')}}
                {{Form::text('name', $record['name'])}}

            </div>

            {{Form::submit(('Save'), ['class' => 'btn btn-success']) }}
        @else
            <h2>{{$title}}</h2>
            <div class="form-group">
                {{Form::label('name', 'Airport name')}}
                {{Form::text('name')}}<br>



            </div>
            {{Form::submit(('Save'), ['class' => 'btn btn-success']) }}
        @endif




    </div>


@endsection