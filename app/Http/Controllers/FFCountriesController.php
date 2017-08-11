<?php namespace App\Http\Controllers;

use App\Models\FFCountries;
use Illuminate\Routing\Controller;

class FFCountriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /ffcountries
	 *
	 * @return Response
	 */
	public function adminIndex()
	{
	    $conf['list'] = FFCountries::get()->toArray();
	    $conf['ignore'] = ['updated_at','created_at','deleted_at'];
        $conf ['rec'] = route('app.countries.create');
        $conf ['title'] = ('Countries');
        $conf['show'] = 'app.countries.show';
        $conf['create'] = 'app.countries.create';
        $conf['edit'] = 'app.countries.edit';
        $conf['delete'] = 'app.countries.delete';

        return view('admin.adminList', $conf);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /ffcountries/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /ffcountries
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /ffcountries/{id}
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
	 * GET /ffcountries/{id}/edit
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
	 * PUT /ffcountries/{id}
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
	 * DELETE /ffcountries/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}