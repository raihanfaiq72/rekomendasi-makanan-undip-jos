<?php

namespace App\Http\Controllers;

use App\Models\mainmodel;
use Illuminate\Http\Request;

class TidakAktifController extends Controller
{
    public function index()
    {
        $data = mainmodel::where('status_rekomendasi',2)->get();
        return view('TidakAktif.index',[
            'data'  => $data
        ]);
    }

    public function tidak(Request $request, $id)
    {
        $data = mainmodel::where('id', $id)->first();
        if ($data) {
            $data->status_rekomendasi = $data->status_rekomendasi == 1 ? 2 : 1;
            
            $data->save();
        }
    
        // return response()->json($data);
        return redirect()->back()->with('sukses','berhasil bor');
    }
}
