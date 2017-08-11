<?php namespace App\Http\Controllers;

use App\Models\FFAirports;
use App\Models\FFCountries;
use Illuminate\Routing\Controller;

class FFAirportsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /ffairports
	 *
	 * @return Response
	 */
	public function adminIndex()
	{
        $conf['list'] = FFAirports::get()->toArray();
        $conf['ignore'] = ['updated_at','created_at','deleted_at'];
        $conf ['rec'] = route('app.airports.create');
        $conf ['title'] = trans('app.airports');
        $conf['show'] = 'app.airports.show';
        $conf['create'] = 'app.airports.create';
        $conf['edit'] = 'app.airports.edit';
        $conf['delete'] = 'app.airports.delete';

        return view('admin.adminList', $conf);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /ffairports/create
	 *
	 * @return Response
	 */
	public function adminCreate()
	{
        $conf['title'] = 'New Airport';
        $conf['country'] = FFCountries::pluck('name', 'id')->toArray();
        $conf['rec'] = route('app.airports.create');
        $conf['back'] = 'app.airports.index';
        return view('admin.airports.form', $conf);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /ffairports
	 *
	 * @return Response
	 */
	public function adminStore()
	{
            $data = request()->all();
            FFAirports::create([
                'name' => $data['name'],
                'city' => $data['city'],
                'country_id' => $data['country_id']
            ]);
            return redirect(route('app.airports.index'));
	}

	/**
	 * Display the specified resource.
	 * GET /ffairports/{id}
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
	 * GET /ffairports/{id}/edit
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
	 * PUT /ffairports/{id}
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
	 * DELETE /ffairports/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}