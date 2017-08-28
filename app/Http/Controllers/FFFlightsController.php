<?php namespace App\Http\Controllers;

use App\Models\FFAirlines;
use App\Models\FFAirports;
use App\Models\FFFlights;
use Carbon\Carbon;
use Illuminate\Routing\Controller;

class FFFlightsController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /ffflights
     *
     * @return Response
     */
    public function adminIndex()
    {
        $conf['list'] = FFFlights::paginate(15)->toArray();;



        $conf ['title'] = ('Flights');
        $conf['ignore'] = ['created_at', 'updated_at', 'deleted_at', 'id', 'count', 'airline_id', 'destination_id', 'origin_id' ];

        $conf['rec'] = route('app.flights.create');
        $conf['paginate'] = FFFlights::paginate(15);
        $conf['create'] = 'app.flights.create';
        $conf['edit'] = 'app.flights.edit';
        $conf['delete'] = 'app.flights.delete';

        return view('admin.adminList', $conf);
    }

    /**
     * Show the form for creating a new resource.
     * GET /ffflights/create
     *
     * @return Response
     */
    public function adminCreate()
    {
        $conf['title'] = 'New Flights';
        $conf['rec'] = route('app.flights.create');
        $conf['origin'] = FFAirports::pluck('name', 'id')->toArray();
        $conf['destination'] = FFAirports::pluck('name', 'id')->toArray();
        $conf['airline'] = FFAirlines::pluck('name', 'id')->toArray();
        $conf['departure'] = Carbon::now()->format('Y-m-d H:i');
        $conf['arrival'] = Carbon::now()->addDays(1)->format('Y-m-d H:i');


        return view('admin.flights.form', $conf);
    }

    /**
     * Store a newly created resource in storage.
     * POST /ffflights
     *
     * @return Response
     */
    public function adminStore()
    {
        $data = request()->all();
//        dd($data);
        FFFlights::create([
            'origin_id' => $data['origin'],
            'destination_id' => $data['destination'],
            'airline_id' => $data['airline'],
            'departure' => $data['departure'],
            'arival' => $data['arrival'],
        ]);
        return redirect(route('app.flights.index'));
    }

    /**
     * Display the specified resource.
     * GET /ffflights/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /ffflights/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function adminEdit($id)
    {
        $conf['id'] = $id;
        $conf['title'] = $id;
        $conf['rec'] = route('app.flights.edit', $id);
        $conf['record'] = FFFlights::find($id)->toArray();
dd($conf);
        return view('admin.flights.form', $conf);
    }

    /**
     * Update the specified resource in storage.
     * PUT /ffflights/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /ffflights/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}