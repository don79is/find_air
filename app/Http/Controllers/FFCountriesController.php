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
        $conf['list'] = FFCountries::paginate(15)->toArray();;
        $conf['paginate'] = FFCountries::paginate(15);
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
	public function adminCreate()
	{
        $conf['title'] = 'New Countries';
        $conf['rec'] = route('app.countries.create');
        $conf['back'] = 'app.countries.index';
        return view('admin.countries.form', $conf);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /ffcountries
	 *
	 * @return Response
	 */
	public function adminStore()
	{
        $data = request()->all();
        FFCountries::create([
            'name' => $data['name'],
            'id' => $data['id'],
        ]);
        return redirect(route('app.countries.index'));
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
	public function adminEdit($id)
	{
        $conf['id'] = $id;
        $conf['title'] = $id;
        $conf['rec'] = route('app.countries.edit', $id);
        $conf['record'] = FFCountries::find($id)->toArray();

        return view('admin.countries.form', $conf);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /ffcountries/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminUpdate($id)
	{
        $data = request()->all();
        $record = FFCountries::find($id);
        $record->update($data);

        return redirect(route('app.countries.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /ffcountries/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminDestroy($id)
	{
        FFCountries::destroy($id);

        return json_encode(["success" => true, "id" => $id]);
	}

}