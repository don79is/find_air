<?php namespace App\Http\Controllers;

use App\Models\FFFlights;
use Illuminate\Routing\Controller;

class FFFlightsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /ffflights
	 *
	 * @return Response
	 */
	public function adminIndex()
	{
        $conf['list'] = FFFlights::all()->toArray();

        $conf ['new'] = route('app.flights.create');
        $conf ['title'] = trans('app.flights');
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
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /ffflights
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /ffflights/{id}
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
	 * GET /ffflights/{id}/edit
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
	 * PUT /ffflights/{id}
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
	 * DELETE /ffflights/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}