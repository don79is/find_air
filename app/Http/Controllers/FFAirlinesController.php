<?php namespace App\Http\Controllers;

use App\Models\FFAirlines;
use Illuminate\Routing\Controller;

class FFAirlinesController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /ffairlines
     *
     * @return Response
     */
    public function adminIndex()
    {
        $conf['list'] = FFAirlines::paginate(15)->toArray();;
        $conf['paginate'] = FFAirlines::paginate(15);
        $conf ['rec'] = route('app.airlines.create');
        $conf ['title'] = ('Airlines');
        $conf['ignore'] = ['updated_at', 'created_at', 'deleted_at'];
        $conf['create'] = 'app.airlines.create';
        $conf['edit'] = 'app.airlines.edit';
        $conf['delete'] = 'app.airlines.delete';

//        dd($conf);
        return view('admin.adminList', $conf);
    }

    /**
     * Show the form for creating a new resource.
     * GET /ffairlines/create
     *
     * @return Response
     */
    public function adminCreate()
    {
        $conf['title'] = 'New Airline';
        $conf['rec'] = route('app.airlines.create');
        $conf['back'] = 'app.airlines.index';
        return view('admin.airlines.form', $conf);
    }

    /**
     * Store a newly created resource in storage.
     * POST /ffairlines
     *
     * @return Response
     */
    public function adminStore()
    {
        $data = request()->all();
        FFAirlines::create([
            'name' => $data['name']
        ]);
        return redirect(route('app.airlines.index'));
    }

    /**
     * Display the specified resource.
     * GET /ffairlines/{id}
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
     * GET /ffairlines/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function adminEdit($id)
    {
        $conf['id'] = $id;
        $conf['title'] = $id;
        $conf['rec'] = route('app.airlines.edit', $id);
        $conf['record'] = FFAirlines::find($id)->toArray();

        return view('admin.airlines.form', $conf);
    }

    /**
     * Update the specified resource in storage.
     * PUT /ffairlines/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function adminUpdate($id)
    {
        $data = request()->all();
        $record = FFAirlines::find($id);
        $record->update($data);

        return redirect(route('app.airlines.index'));
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /ffairlines/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        FFAirlines::destroy($id);

        return json_encode(["success" => true, "id" => $id]);
    }

}