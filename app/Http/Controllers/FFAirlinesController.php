<?php namespace App\Http\Controllers;

use App\Models\FFAirlines;
use Illuminate\Routing\Controller;

class FFAirlinesController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /ffairlines
	 *
	 * @return Response
	 */
	public function adminIndex()
	{
        $conf['list'] = FFAirlines::get()->toArray();
        $conf ['rec'] = route('app.airlines.create');
        $conf ['title'] = trans('app.airlines');
        $conf['ignore'] = ['updated_at','created_at','deleted_at'];
        $conf['show'] = 'app.airlines.show';
        $conf['create'] = 'app.airlines.create';
        $conf['edit'] = 'app.airlines.edit';
        $conf['delete'] = 'app.airlines.delete';

        return view('admin.adminList', $conf);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /ffairlines/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /ffairlines
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /ffairlines/{id}
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
	 * GET /ffairlines/{id}/edit
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
	 * PUT /ffairlines/{id}
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
	 * DELETE /ffairlines/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}