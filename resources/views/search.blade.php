@extends('admin.adminCore')
@section('content')
    <div class="form-group">

    {!! Form::open(['method'=>'GET', 'url' => $rec]) !!}


    {{Form::select('time',$time)}}
    </div>
@endsection

