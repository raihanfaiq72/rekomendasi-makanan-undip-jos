<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mainmodel;

class MauMakanController extends Controller
{
    public function index()
    {
        return view('maumakan.index');
    }

    public function cari(Request $request)
    {
        $keyword = $request->input('nama');

        $hasil   = mainmodel::where('nama','like','%'.$keyword)->get();

        return view('maumakan.cari',[
            'hasil'     => $hasil,
            'keyword'   => $keyword
        ]);
    }
}
