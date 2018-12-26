<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstrumenAssesmentPemulian;
use App\Models\Provinsi;
use App\Models\Kabupaten;
class InstrumenAssesmentPemulianController extends Controller
{
     public function index()
    {
        $data=InstrumenAssesmentPemulian::with('user')->get();
        $provinsi=Provinsi::all();
        return view('pages.instrumen.assesment-pemulihan.index')->with('data',$data)->with('provinsi',$provinsi);
    }
}
