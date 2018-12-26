<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstrumenAssesment;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Notifikasi;
use App\Models\Sdm;
use App\User;
use Auth;
use PDF;
class InstrumenAssesmentController extends Controller
{
    public function index()
    {
        $data=InstrumenAssesment::with('user')->get();
        $provinsi=Provinsi::all();
        return view('pages.instrumen.assesment-bantuan.index')->with('data',$data)->with('provinsi',$provinsi);
    }
     public function show($id)
    {
        $data=InstrumenAssesment::find($id);
        $provinsi=Provinsi::all();
        return view('pages.instrumen.assesment-bantuan.detail')->with('data',$data)->with('provinsi',$provinsi);
    }

    public function data_laporan_verifikasi(Request $request, $id)
    {
        $data=InstrumenAssesment::find($id);
        $data->status='1';
        $data->save();

        $notif=new Notifikasi;
        $notif->judul  = 'Verifikasi Data Laporan';
        $notif->pesan  = 'Data Laporan '.$data->no_laporan.' Telah Di Verifikasi';
        $notif->tanggal  = date('Y-m-d');
        $notif->jam  = date('H:i:s');
        $notif->sender  = Auth::user()->id;
        $notif->to  = $data->id_user;
        $notif->seen_status  = 0;
        $notif->save();

        return redirect('data-laporan/'.$id)->with('pesan','Data Laporan berhasil Di Verifikasi');
    }
    public function data_laporan_tidak_lengkap(Request $request, $id)
    {
        $data=InstrumenAssesment::find($id);
        $data->status='1b';
        $data->save();

        $notif=new Notifikasi;
        $notif->judul  = 'Verifikasi Data Laporan';
        $notif->pesan  = 'Data Laporan '.$data->no_laporan.' Yang Di Input Tidak Lengkap, Silahkan Input Ulang';
        $notif->tanggal  = date('Y-m-d');
        $notif->jam  = date('H:i:s');
        $notif->sender  = Auth::user()->id;
        $notif->to  = $data->id_user;
        $notif->seen_status  = 0;
        $notif->save();

        return redirect('data-laporan/'.$id)->with('pesan','Data Laporan berhasil Di Verifikasi');
    }
    public function data_laporan_upload_nodin(Request $request, $id)
    {
        $val=$request->notadinas;
        $val->storeAs('nodin',$val->getClientOriginalName());
        $dir='nodin/'.$val->getClientOriginalName(); 
        $data=InstrumenAssesment::find($id);
        $data->status='2';
        $data->nodin_kasubdit=$dir;
        $data->save();

        $notif=new Notifikasi;
        $notif->judul  = 'Data Nota Dinas';
        $notif->pesan  = 'Data Nota Dinas Terkait Laporan '.$data->no_laporan.' Telah Ditambahkan';
        $notif->tanggal  = date('Y-m-d');
        $notif->jam  = date('H:i:s');
        $notif->sender  = Auth::user()->id;
        $notif->to  = $data->id_user;
        $notif->seen_status  = 0;
        $notif->save();

        return redirect('data-laporan/'.$id)->with('pesan','Nota Dinas Kasubdit Berhasil Di Unggah');
    }
    public function data_laporan_upload_sk(Request $request, $id)
    {
        $val=$request->sk;
        $val->storeAs('sk',$val->getClientOriginalName());
        $dir='sk/'.$val->getClientOriginalName(); 
        $data=InstrumenAssesment::find($id);
        $data->status='4';
        $data->nodin_direktur=$dir;
        $data->save();

        $notif=new Notifikasi;
        $notif->judul  = 'SK';
        $notif->pesan  = 'SK Terkait Laporan '.$data->no_laporan.' Telah Di Unggah';
        $notif->tanggal  = date('Y-m-d');
        $notif->jam  = date('H:i:s');
        $notif->sender  = Auth::user()->id;
        $notif->to  = $data->id_user;
        $notif->seen_status  = 0;
        $notif->save();

        return redirect('data-laporan/'.$id)->with('pesan','SK Direktur Berhasil Di Unggah');
    }
    public function data_laporan_disposisi(Request $request, $id)
    {
        $data=InstrumenAssesment::find($id);
        $data->status='3a';
        $data->disposisi_direktur=$request->disposisi;
        $data->save();

        $notif=new Notifikasi;
        $notif->judul  = 'Laporan Di Setujui';
        $notif->pesan  = 'Laporan '.$data->no_laporan.' Telah Di Setujui Oleh Direktur';
        $notif->tanggal  = date('Y-m-d');
        $notif->jam  = date('H:i:s');
        $notif->sender  = Auth::user()->id;
        $notif->to  = $data->id_user;
        $notif->seen_status  = 0;
        $notif->save();

        return redirect('data-laporan/'.$id)->with('pesan','Disposisi Direktur Berhasil Di Tambahkan');
    }
    public function cetak_laporan($id)
    {
        $det=InstrumenAssesment::find($id);
        $user = User::find($det->id_user);
        $sdm = Sdm::where('id',$user->id_sdm)->get();
        $data =[
            'id' => $id,
            'det' => $det,
            'user' => $user,
            'sdm' => $sdm,
        ];

        $pdf = PDF::loadView('pages.instrumen.assesment-bantuan.cetak',$data); //load view page
        return $pdf->download('InstrumenLaporan.pdf'); // download pdf file
    }
}
