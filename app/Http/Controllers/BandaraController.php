<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bandara;
use App\Http\Requests\BandaraRequest;

class BandaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model = new Bandara;
        // $datas = Bandara::all();

        $keyword = $request->get('search');

        $datas = Bandara::where('kode_bandara', 'LIKE', '%' . $keyword . '%')
            ->orWhere('nama_bandara', 'LIKE', '%' . $keyword . '%')
            ->orWhere('alamat_bandara', 'LIKE', '%' . $keyword . '%')
            ->paginate();

        $datas->withPath('bandara');
        $datas->appends($request->all());
        return view('bandara.index', compact(
            'datas', 'model', 'keyword'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Bandara;
        return view('bandara.create', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BandaraRequest $request)
    {
        $model = new Bandara;
        $model->kode_bandara = $request->get('kode_bandara');
        $model->nama_bandara = $request->get('nama_bandara');
        $model->alamat_bandara = $request->get('alamat_bandara');
        $model->created_by = 1;
        $model->updated_by = 1;
        $model->save();

        return redirect('bandara');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Bandara::find($id);
        return view('bandara.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BandaraRequest $request, $id)
    {
        $model = Bandara::find($id);
        $model->kode_bandara = $request->get('kode_bandara');
        $model->nama_bandara = $request->get('nama_bandara');
        $model->alamat_bandara = $request->get('alamat_bandara');
        $model->updated_by = 1;
        $model->save();

        return redirect('bandara');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Bandara::find($id);
        $model->delete();
        return redirect("bandara");
    }
}
