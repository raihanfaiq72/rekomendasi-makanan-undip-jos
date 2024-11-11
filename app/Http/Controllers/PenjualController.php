<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

use App\Models\mainmodel;

class PenjualController extends Controller
{
    public function index()
    {
        return view('Penjual.index');
    }

    public function create()
    {
        return view('Penjual.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'idUser'    => 'required',
            'idWaktu'   => 'required',
            'nama'      => 'required',
            'lokasi'    => 'required',
            'harga'     => 'required',
            'keterangan'    => 'required',
        ]);

       $cek =  mainmodel::create([
            'idUser'    => Auth::user()->id,
            'idWaktu'   => $request->idWaktu,
            'nama'      => $request->nama,
            'lokasi'    => $request->lokasi,
            'harga'     => $request->harga,
            'keterangan'    => $request->keterangan,
            'gambar'        => "about.jpg",
            'status_rekomendasi'    => 1
        ]);


        if(!$cek){
            return redirect('penjual')->with('sukses','data penjual berhasil ditambahkan');
        }else{
            return redirect('penjual')->with('gagal','data penjual gagal ditambahkan');
        }
    }
}
