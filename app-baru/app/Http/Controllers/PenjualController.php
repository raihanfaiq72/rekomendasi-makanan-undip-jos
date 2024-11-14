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
            'data'  => mainmodel::where('id',$id)->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $data = mainmodel::findOrFail($id);

            $data->update([
                'idUser'    => Auth::user()->id,
                'idWaktu'   => $request->idWaktu,
                'nama'      => $request->nama,
                'lokasi'    => $request->lokasi,
                'harga'     => $request->harga,
                'keterangan'    => $request->keterangan,
                'gambar'        => "about.jpg",
                'status_rekomendasi'    => 1
            ]);
            return redirect('penjual')->with('sukses','data penjual berhasil diedit');

        } catch (\Exception $e) {
            return redirect('penjual')->with('gagal','data penjual berhasil diedit');
        }
    }


    public function destroy(Request $request,$id)
    {
        try{
            $data = mainmodel::findOrFail($id);
            $data->delete();
            return redirect('penjual')->with('sukses','data berhasil dihapus');
        }catch(\Exception $e){
            return redirect('penjual')->with('gagal','data gagal dihapus');
        }
    }

}
