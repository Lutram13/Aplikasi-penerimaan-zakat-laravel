<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\muzakkiBeras;
use App\muzakkiUang;
use DataTables;
use Validator;
use Alert;

class muzakkiController extends Controller

{
    public function index()
    {
        $jumlahBeras = muzakkiBeras::query()->sum('jumlahBeras');
        $jumlahMuzzakiBeras = muzakkiBeras::query()->count();
        $jumlahUang = muzakkiUang::query()->sum('jumlahUang');
        $jumlahMuzzakiUang = muzakkiUang::query()->count();
        return view('page.muzakki.index', [
            'jumlahBeras' => $jumlahBeras,'jumlahMuzzakiBeras'=>$jumlahMuzzakiBeras,
            'jumlahUang' => $jumlahUang,'jumlahMuzzakiUang'=>$jumlahMuzzakiUang
            ]);
    }

    
    // Muzakki Beras
    public function createBeras()
    {
        $model = new muzakkiBeras();
        return view('page.muzakki.beras_form', compact('model'));
    }

    public function storeBeras(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
        ]);

        $model = muzakkiBeras::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'rt' => $request->rt,
                'jumlahBeras' => $request->jumlahBeras,
                'keterangan' => $request->keterangan,
            ]);
        return $model;
    }

    public function showBeras($id)
    {
        $model = muzakkiBeras::findOrFail($id);
        return view('page.muzakki.beras_show', compact('model'));
    }

    public function editBeras($id)
    {
        $model = muzakkiBeras::findOrFail($id);
        return view('page.muzakki.beras_form', compact('model'));
    }

    public function updateBeras(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255|unique:pelanggans,email,' . $id
        ]);

        $model = muzakkiBeras::findOrFail($id);

        $model->update($request->all());
        return view('page.muzakki.index', compact('model'));
    }

    public function destroyBeras($id)
    {
        $model = muzakkiBeras::findOrFail($id);
        $model->delete();
    }    

    public function dataTableMuzakkiBeras()
    {
        // return 'Ini table';
        $model = muzakkiBeras::query();
        return DataTables::of($model)
            ->addColumn('aksi', function ($model) {
                return view('page.muzakki._action', [
                    'model' => $model,
                    'url_show' => route('muzakki.beras.show', $model->id),
                    'url_edit' => route('muzakki.beras.edit', $model->id),
                    'url_destroy' => route('muzakki.beras.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['aksi'])
            ->make(true);
    }


    // Muzakki Uang
    public function createUang()
    {
        $model = new muzakkiUang();
        return view('page.muzakki.Uang_form', compact('model'));
    }

    public function storeUang(Request $request)
    {
        $this->validate($request, [
            // 'namaMuzakki' => 'required|string|max:255',
        ]);

        $model = muzakkiUang::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'rt' => $request->rt,
                'jumlahUang' => $request->jumlahUang,
                'keterangan' => $request->keterangan,
            ]);
        return $model;
    }

    public function showUang($id)
    {
        $model = muzakkiUang::findOrFail($id);
        return view('page.muzakki.uang_show', compact('model'));
    }

    public function editUang($id)
    {
        $model = muzakkiUang::findOrFail($id);
        return view('page.muzakki.uang_form', compact('model'));
    }

    public function updateUang(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255|unique:pelanggans,email,' . $id
        ]);

        $model = muzakkiUang::findOrFail($id);

        $model->update($request->all());
        return view('page.muzakki.index', compact('model'));
    }

    public function destroyUang($id)
    {
        $model = muzakkiUang::findOrFail($id);
        $model->delete();
    }    

    public function dataTableMuzakkiUang()
    {
        // return 'Ini table';
        $model = muzakkiUang::query();
        return DataTables::of($model)
            ->addColumn('aksi', function ($model) {
                return view('page.muzakki._action', [
                    'model' => $model,
                    'url_show' => route('muzakki.uang.show', $model->id),
                    'url_edit' => route('muzakki.uang.edit', $model->id),
                    'url_destroy' => route('muzakki.uang.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['aksi'])
            ->make(true);
    }
}

