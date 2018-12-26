<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstrumenJHPKBS;
use App\Models\Provinsi;
use App\Models\Kabupaten;
class InstrumenJHPKBSController extends Controller
{
    public function index()
    {
        $data=InstrumenJHPKBS::with('user')->get();
        $provinsi=Provinsi::all();
        return view('pages.instrumen.kejadian.index')->with('data',$data)->with('provinsi',$provinsi);
    }
}
