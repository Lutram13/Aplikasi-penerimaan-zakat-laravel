<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mustahik;
use App\muzakkiBeras;
use App\muzakkiUang;
use DataTables;
use Validator;
use Alert;

class penghitunganController extends Controller
{
    public function index()
    {
        $data_mustahik = mustahik::get();
        $golongan = mustahik::query()->groupBy('golongan')->pluck('golongan');
        $i = 0;
        foreach ($golongan as $gol) {
            $jumlah = mustahik::where('golongan', $gol)->count();
            $anggota = mustahik::where('golongan', $gol)->pluck('id');
            $info_mustahik[$i]['nama'] = $gol;
            $info_mustahik[$i]['jumlah'] = $jumlah;
            $info_mustahik[$i]['angggota'] = $anggota;
            $i++;
        }       
        $jumlahBeras = muzakkiBeras::query()->sum('jumlahBeras');
        $jumlahMuzzakiBeras = muzakkiBeras::query()->count();
        $jumlahUang = muzakkiUang::query()->sum('jumlahUang');
        $jumlahMuzzakiUang = muzakkiUang::query()->count();
        // return $golongan;

        return view('page.penghitungan.index', [
            'jumlahBeras' => $jumlahBeras,'jumlahMuzzakiBeras'=>$jumlahMuzzakiBeras,
            'jumlahUang' => $jumlahUang,'jumlahMuzzakiUang'=>$jumlahMuzzakiUang,
            'data_mustahik' => $data_mustahik, 'info_mustahik' => $info_mustahik,
            'golongan' => $golongan
            ]);
        return view('page.penghitungan.index');
    }
}
