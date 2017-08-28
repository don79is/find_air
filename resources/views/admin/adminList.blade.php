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

                    @foreach($list['data'][0] as $key => $value)
                        @if(!in_array($key, $ignore))
                            <th >{{$key}}</th>
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
                @foreach($list['data'] as $key => $record)
                    <tr id="{{$record['id']}}">
                        @foreach($record as $key => $value)
                            @if(!in_array($key, $ignore))
                                @if($key == 'origin_airport')
                                    <td>
                                        {{$value['name']}}(Airport),
                                    </td>
                                @elseif($key == 'destination_airport')
                                    <td>
                                        {{$value['name']}}(Airport),
                                    </td>
                                @elseif($key == 'airline')
                                    <td>{{$value['name']}}</td>
                                @else
                                    <td>
                                        {{$value}}
                                    </td>
                                @endif
                            @endif
                        @endforeach

                        <td>
                            <a class="btn btn-success"
                               href="{{ route($edit, $record['id']) }}">Edit</a></td>
                        <td>
                            <button class="btn btn-danger"
                                    onclick="deleteItem('{{route( $delete, $record['id'])}}')">Delete
                            </button>
                        </td>

                    </tr>
                @endforeach
            </table>
            <nav aria-label="Page navigation example">
                {!! $paginate->links()!!}
            </nav>
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