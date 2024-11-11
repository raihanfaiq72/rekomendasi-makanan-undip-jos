<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenjualController extends Controller
{
    public function index()
    {
        return view('Penjual.index');
    }
}
