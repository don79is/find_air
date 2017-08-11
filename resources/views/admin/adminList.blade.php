@extends('admin.adminCore')

@section('content')
    <div id="list">
        {{$title}}<br>
        <a href="{{$rec}}" class="btn btn-primary" role="button">
            New Record</a>
        <hr/>
        @if(sizeof($list)>0)
        <table class="table">
            <thead class="thead-inverse">
            <tr>
                @foreach($list[0] as $key => $value)
                    @if(!in_array($key, $ignore))
                        <th>{{$key}}</th>
                    @endif
                @endforeach
                @if(isset($edit))
                    <th> Edit</th>
                @endif
                @if(isset($delete))
                    <th> Delete</th>
                @endif
            </tr>
            </thead>
            @foreach($list as $key => $record)
                <tr id="{{$record['id']}}">
                    @foreach($record as $key => $value)
                        @if(!in_array($key, $ignore))
                            <td>
                                {{$value}}
                            </td>
                        @endif
                    @endforeach

                    <td>
                        <a class="btn btn-info"
                           href="{{ route($edit, $record['id']) }}">Edit</a></td>
                    <td>
                        <button class="btn btn-danger"
                                onclick="deleteItem('{{route( $delete, $record['id'])}}')">Delete</button>
                    </td>

                </tr>
            @endforeach
        </table>
        @else {{'No records'}}

        @endif
    </div>
@endsection

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function deleteItem(route) {
            $.ajax({
                url: route,
                type: 'DELETE',
                dataType: 'json',
                success: function (response) {
                    $('#' + response.id).remove();
                },
                error: function () {
                    alert('ERROR')
                }
            });
        }
    </script>
@endsection