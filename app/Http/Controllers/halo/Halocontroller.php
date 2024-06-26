<?php

namespace App\Http\Controllers\halo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Halocontroller extends Controller
{
    public function index(){
        // return '<h1>Hallo dari controller</h1>';
        $nama = 'fachmi';
        $data = [ 'namaOrang' => $nama];
        return view('coba.hallo', $data);
    }
}
