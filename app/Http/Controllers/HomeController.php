<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Provinsi;
use App\Models\Kabupaten;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.dashboard.index');
    }

    
    public function master()
    {
        return view('pages.master.index');
    }
    

    public function login(Request $request)
    {
        return redirect('home');
    }

    public function unduh($dir,$file)
    {
        return response()->download(storage_path('app/'.$dir.'/'.$file));
    }

    public function pilih_kab($idprov)
    {
        $kab=Kabupaten::where('province_id',$idprov)->get();
        echo '<select name="kabupaten" id="" palceholder="Kabupaten/Kota" class="selectbox" style="" >
                <option value="0">-Kabupaten-</option>';
                foreach($kab as $k=>$v)
                {
                    echo '<option value="'.$v->id.'">'.$v->name.'</option>';
                }
        echo '</select>';
    }
    public function update_koordinat()
    {
        $text='ACEH,4.695135,96.749397;SUMATERA UTARA,3.597031,98.678513;SUMATERA BARAT,-0.942942,100.371857;RIAU,0.293347,101.706825;JAMBI,-1.609972,103.607254;SUMATERA SELATAN,-2.990934,104.756554;BENGKULU,-3.788892,102.266579;LAMPUNG,-5.450000,105.266670;DKI JAKARTA,-6.285020,106.817060;JAWA BARAT,-7.090911,107.668884;JAWA TENGAH,-7.150975,110.140259;DI YOGYAKARTA,-7.875385,110.426208;JAWA TIMUR,-7.536064,112.238403;BALI,-8.340539,115.091949;KALIMANTAN BARAT,-0.278781,111.475288;KALIMANTAN TIMUR,0.538659,116.419388;KALIMANTAN SELATAN,-3.092642,115.283760;KALIMANTAN TENGAH,-1.681488,113.382355;SULAWESI BARAT,-2.844137,119.232079;SULAWESI SELATAN,-3.668799,119.974052;SULAWESI TENGGARA,-4.144910,122.174606;SULAWESI TENGAH,-1.430025,121.445618;SULAWESI UTARA,0.624693,123.974998;NUSA TENGGARA BARAT,-8.652933,117.361649;NUSA TENGGARA TIMUR,-8.657382,121.079369;MALUKU,-3.238462,130.145279;PAPUA,-4.269928,138.080353;BANTEN,-6.405817,106.064018;KEPULAUAN BANGKA BELITUNG,-1.935890,105.946060;GORONTALO,0.699937,122.446724;MAULUKU UTARA,1.570999,127.808769;KEPULAUAN RIAU,1.130078,104.052917;PAPUA BARAT,-1.336115,133.174713';

        $data=explode(";",$text);
        foreach($data as $val)
        {
            $pr=explode(',',$val);
            $cek=Provinsi::where('name',$pr[0])->first();
            $cek->lattitude=$pr[1];
            $cek->longitude=$pr[2];
            $cek->save();
        }
    }

    public function lihat_dokumen($dir,$file)
    {
        return response()->file(storage_path('app/'.$dir.'/'.$file));
        // return response()->download(storage_path('app/'.$dir.'/'.$file));
    }

    public function kirim_notif()
    {
        $title='Laporan Baru';
        $message='Anda Telah Mengirimkan Laporan ';
        $firebasedevicetoken='fBjge_9Z5v4:APA91bFJXPCPHKq0eeZfent0LcfbC8pPEwbpJW_7GxerDboDc20ZsiXxyNsCvMPfF_JfBgkyrxH7h2nGtWUHfb4uSVPcEotD4WsZ_ojMS3gbl2f3wSCx1HB_Vd9VxtzJaNolRzLqWt_o';
        sendFCM($title, $message, $firebasedevicetoken);
    }
}
