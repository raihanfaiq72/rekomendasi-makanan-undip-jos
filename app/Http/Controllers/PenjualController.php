<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Illuminate\Support\Facades\Auth;


use App\Models\mainmodel;

class PenjualController extends Controller
{
    public function index()
    {
        return view('Penjual.index',[
            'data'  => mainmodel::get(),
        ]);
    }

    public function create()
    {
        return view('Penjual.create');
    }

    public function store(Request $request)
    {
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

    public function edit($id)
    {
        return view('Penjual/edit',[
            'data'  => mainmodels::where('id',$id)->first()
        ]);
    }

    public function update(Request $request,$id)
    {
        try{
            $data                   = findOrFail($id);
            $data->idUser           = Auth::user()->id;
            $data->idWaktu          = $request->idWaktu;
            $data->nama             = $request->nama;
            $data->lokasi           = $request->lokasi;
            $data->harga            = $request->harga;
            $data->keterangan       = $request->keterangan;
            $data->gambar           = $request->gambar;
            $data->status_rekomendasi = $request->status_rekomendasi;
        }catch(\Exception $e){

        }
    }
}
