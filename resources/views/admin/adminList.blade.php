@extends('admin.adminCore')

@section('list')
    <table>
        <tr>
            @foreach($list[0] as $key => $value)

                <th> {{$key}}</th>
            @endforeach
        </tr>

        @foreach($list as $key=>$record)
            <tr>
                @foreach($record as $key=> $value)

                    <td> {{$value}}</td>

                @endforeach
            </tr>
        @endforeach

    </table>

@endsection