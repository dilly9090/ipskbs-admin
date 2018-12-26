<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Sdm;
use App\Models\Provinsi;
use Validator;
class UnitController extends Controller
{
    public function index()
    {
        $unit=Unit::where('status',1)->with('kabupaten')->with('provinsi')->orderBy('id_parent')->get();
        $d_unit=array();
        foreach($unit as $k=>$v)
        {
            $d_unit[$v->id_parent][$v->id]=$v;
        }
        $sdm=Sdm::orderBy('nama_lengkap')->get();
        $provinsi=Provinsi::all();
        return view('pages.master.unit')->with('d_unit',$d_unit)->with('unit',$unit)->with('provinsi',$provinsi);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'nama_unit' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'singkatan' => 'required'
        ])->validate();

        // $unit=Unit::where('nama_unit','like',"%$request->nama_unit%")->where('sub_unit','-')->first();

        $insert=new Unit;
        $insert->nama_unit = $request->nama_unit;
        $insert->id_parent = $request->provinsi;
        $insert->sub_unit = $request->kabupaten;
        $insert->singkatan = $request->singkatan;
        $insert->status = 1;
        $insert->save();

        return redirect('master-unit')->with('success','Data Unit Berhasil Di Tambah');
    }
    public function update(Request $request,$id)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'nama_unit' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'singkatan' => 'required'
        ])->validate();

        $u=Unit::find($id);

        // $unit=Unit::where('nama_unit','like',"%$request->nama_unit%")->where('sub_unit','-')->first();

         
            $insert=Unit::find($id);
            $insert->nama_unit = $request->nama_unit;
            $insert->id_parent = $request->provinsi;
            $insert->sub_unit = $request->kabupaten;
            $insert->singkatan = $request->singkatan;

            $insert->save();
        


        return redirect('master-unit')->with('success','Data Unit Berhasil Di Perbaharui');
    }

    public function destroy($id)
    {
        Unit::destroy($id);

        return redirect()->route('master-unit.index')
            ->with('success', 'Anda telah menghapus data.');
    }

    public function edit($id)
    {
        return Unit::find($id);
    }

}
