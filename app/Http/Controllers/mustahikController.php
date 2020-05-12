<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mustahik;
use DataTables;
use Validator;
use Alert;


class mustahikController extends Controller
{
    public function index()
    {
        return view('page.mustahik.index');
    }

    public function create()
    {
        $model = new mustahik();
        return view('page.mustahik.form', compact('model'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'golongan' => 'required',
        ]);

        $model = mustahik::create([
                'nama' => $request->nama,
                'golongan' => $request->golongan,
                'alamat' => $request->alamat,
                'terimaUang' => 0,
                'terimaBeras' => 0.0,
                'keterangan' => $request->keterangan,
            ]);
        return $model;
    }

    public function show($id)
    {
        $model = mustahik::findOrFail($id);
        return view('page.mustahik.show', compact('model'));
    }

    public function edit($id)
    {
        $model = mustahik::findOrFail($id);
        return view('page.mustahik.form', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'alamat' => 'required',
        ]);

        $model = mustahik::findOrFail($id);

        // $model->update($request->all());
        $model->nama = $request->nama;
        $model->golongan = $request->golongan;
        $model->alamat = $request->alamat;
        $model->keterangan = $request->keterangan;

        $model->save();

        return view('page.mustahik.index', compact('model'));
    }

    public function destroy($id)
    {
        $model = mustahik::findOrFail($id);
        $model->delete();
    }

    public function dataTableMustahik()
    {
        // return 'Ini table';
        $model = mustahik::query();
        return DataTables::of($model)
            ->addColumn('aksi', function ($model) {
                return view('page._action', [
                    'model' => $model,
                    'url_show' => route('mustahik.show', $model->id),
                    'url_edit' => route('mustahik.edit', $model->id),
                    'url_destroy' => route('mustahik.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['aksi'])
            ->make(true);
    }
}
