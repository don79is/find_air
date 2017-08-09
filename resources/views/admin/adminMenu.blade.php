<div id="menu">
    <h2>{{trans('app.admin_side_bar')}}</h2>
    <ul>

        <li><a href="{{route('app.countries.index')}}">{{trans('app.countries')}}</a></li>
        <li><a href="{{route('app.airlines.index')}}">{{trans('app.airlines')}}</a></li>
        <li><a href="{{route('app.airports.index')}}">{{trans('app.airports')}}</a></li>
        <li><a href="{{route('app.flights.index')}}">{{trans('app.flights')}}</a></li>
    </ul>
</div>