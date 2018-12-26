<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisBencana;
use Validator;
class JenisBencanaController extends Controller
{
    public function index()
    {
        $jenis=JenisBencana::orderBy('jenis')->get();
        return view('pages.master.jenis')->with('jenis',$jenis);
    }
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'jenis' => 'required',
            'flag' => 'required',
            
        ])->validate();

        $insert=new JenisBencana;
        $insert->jenis = $request->jenis;
        $insert->keterangan = $request->keterangan;
        $insert->flag = $request->flag;
        $insert->save();

        return redirect('master-jenis')->with('success','Data Jenis Bencana Berhasil Di Tambah');
    }
    public function update(Request $request,$id)
    {
        Validator::make($request->all(), [
            'jenis' => 'required',
            'flag' => 'required',
            
        ])->validate();

        $insert=JenisBencana::find($id);
        $insert->jenis = $request->jenis;
        $insert->keterangan = $request->keterangan;
        $insert->flag = $request->flag;
        $insert->save();

        return redirect('master-jenis')->with('success','Data Jenis Bencana Berhasil Di Perbaharui');
    }
     public function destroy($id)
    {
        JenisBencana::destroy($id);

        return redirect()->route('master-jenis.index')
            ->with('success', 'Anda telah menghapus data.');
    }

    public function edit($id)
    {
        return JenisBencana::find($id);
    }
}
