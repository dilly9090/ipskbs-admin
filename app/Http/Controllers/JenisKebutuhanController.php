<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisKebutuhan;
use Validator;
class JenisKebutuhanController extends Controller
{
    public function index()
    {
        $jenis=JenisKebutuhan::orderBy('jenis')->get();
        return view('pages.master.jenis-kebutuhan')->with('jenis',$jenis);
    }
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'jenis' => 'required',
            'flag' => 'required',
            
        ])->validate();

        $insert=new JenisKebutuhan;
        $insert->jenis = $request->jenis;
        $insert->keterangan = $request->keterangan;
        $insert->flag = $request->flag;
        $insert->save();

        return redirect('master-kebutuhan')->with('success','Data Jenis Kebutuhan Berhasil Di Tambah');
    }
    public function update(Request $request,$id)
    {
        Validator::make($request->all(), [
            'jenis' => 'required',
            'flag' => 'required',
            
        ])->validate();

        $insert=JenisKebutuhan::find($id);
        $insert->jenis = $request->jenis;
        $insert->keterangan = $request->keterangan;
        $insert->flag = $request->flag;
        $insert->save();

        return redirect('master-kebutuhan')->with('success','Data Jenis Kebutuhan Berhasil Di Perbaharui');
    }
     public function destroy($id)
    {
        JenisKebutuhan::destroy($id);

        return redirect()->route('master-kebutuhan.index')
            ->with('success', 'Anda telah menghapus data.');
    }

    public function edit($id)
    {
        return JenisKebutuhan::find($id);
    }
}
