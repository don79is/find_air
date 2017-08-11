<?php namespace App\Http\Controllers;

use App\Models\FFAirports;
use App\Models\FFFlights;
use Carbon\Carbon;
use Illuminate\Routing\Controller;

class FFSearchController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /ffsearch
	 *
	 * @return Response
	 */
	public function adminIndex()
    {
        $conf ['title'] = ('Flights');
        $conf['ignore'] = ['created_at', 'updated_at', 'deleted_at', 'id', 'count', 'airline_id', 'destintation_id', 'orgin_id' ];
        $conf['rec'] = route('app.search.index');
        $conf['list'] = FFFlights::get()->toArray();
        $conf['origin'] = FFAirports::pluck('name', 'id')->toArray();
        $conf['destination'] = FFAirports::pluck('name', 'id')->toArray();
        $conf['time'] = Carbon::now()->format('Y-m-d');
//        dd($conf);
        return view('welcome', $conf);
    }

	/**
	 * Show the form for creating a new resource.
	 * GET /ffsearch/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /ffsearch
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /ffsearch/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /ffsearch/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /ffsearch/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /ffsearch/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}