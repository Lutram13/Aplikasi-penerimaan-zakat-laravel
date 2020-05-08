<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\muzakkiBeras;
use DataTables;
use Validator;

class muzakkiController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.muzakki.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'namaMuzakki' => 'required|string|max:255',
        ]);

        $model = muzakkiBeras::create([
                'nama' => $request->namaMuzakki,
                'alamat' => $request->alamatMuzakki,
                'rt' => $request->RTMuzakki,
                'jumlahBeras' => $request->jumlahBeras,
                'keterangan' => $request->keterangan,
            ]);
        return 'berhasil';
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function dataTableMuzakki()
    {
        // return 'Ini table';
        $model = muzakkiBeras::query();
        return DataTables::of($model)
            ->addColumn('aksi', function ($model) {
                return view('page.muzakki._action', [
                    'model' => $model,
                    'url_show' => route('muzakki.index', $model->id),
                    'url_edit' => route('muzakki.index', $model->id),
                    'url_destroy' => route('muzakki.index', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['aksi'])
            ->make(true);
    }
}

