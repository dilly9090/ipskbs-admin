<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Sdm;
use App\Models\JenisKebutuhan;
use App\Models\InstrumenAssesment;
use App\Models\InstrumenAssesmentPemulian;
use App\Models\InstrumenJHPKBS;
use App\Models\InstrumenLaporanKejadian;
use App\Models\Notifikasi;
use DB;
use Hash;
class JsonController extends Controller
{
    public function json_user($email,$pass)
    {
        $user=User::where('email',$email)->first();
        if(!is_null($user))
        {
        
            $sdm=Sdm::where('email',$email)->first();
            if (Hash::check($pass, $user->password)) 
            {
                $data['data']=$user;
                $data['sdm']=$sdm;
                $data['response']='success';    
            }
            else
            {
                $data['data']=array();
                $data['sdm']=array();
                $data['response']='fail';
            }
        }
        else
        {
            $data['data']=array();
            $data['sdm']=array();
            $data['response']='fail';
        }
        echo json_encode($data);
    }

    public function json_provinsi()
    {
        $prov=Provinsi::all();
        echo json_encode($prov);
    }
    public function json_kabupaten($idprov)
    {
        $kab=Kabupaten::where('province_id',$idprov)->get();
        echo json_encode($kab);
    }
    
    public function json_kebutuhan()
    {
        $jenis=JenisKebutuhan::all();
        echo json_encode($jenis);
    }
    public function json_notifikasi($iduser)
    {
        $notif=Notifikasi::where('sender',$iduser)->orWhere('to',$iduser)->orderBy('created_at','desc')->get();
        //echo json_encode($notif);
        $dt['result']=$notif;
        return $dt;
    }

    public function getlaporan($iduser)
    {
        $lap1=InstrumenAssesment::select('*',DB::raw('"laporan-kematian" as jenis'))->where('id_user',$iduser)->get();
        $lap2=InstrumenAssesmentPemulian::select('*',DB::raw('"bantuan-bahan" as jenis'))->where('id_user',$iduser)->get();
        $lap3=InstrumenJHPKBS::select('*',DB::raw('"jaminan-hidup" as jenis'))->where('id_user',$iduser)->get();
        $lap4=InstrumenLaporanKejadian::select('*',DB::raw('"laporan-kejadian" as jenis'))->where('id_user',$iduser)->get();

        $data=array();
        foreach($lap1 as $k=>$v)
        {
            $data[strtok($v->created_at,' ')][]=$v;
        }
        foreach($lap2 as $k=>$v)
        {
            $data[strtok($v->created_at,' ')][]=$v;
        }
        foreach($lap3 as $k=>$v)
        {
            $data[strtok($v->created_at,' ')][]=$v;
        }
        foreach($lap4 as $k=>$v)
        {
            $data[strtok($v->created_at,' ')][]=$v;
        }
        krsort($data);
        $data2=$det=array();
        foreach($data as $k=>$v)
        {
            foreach($v as $kk=>$vv)
            {
                $data2[]=$vv;
                $det[$vv->jenis.'-'.$vv->id]=$vv;
            }
        }
        $notif=Notifikasi::where('sender',$iduser)->orWhere('to',$iduser)->orderBy('created_at','desc')->get();
        $dt['result']=$data2;
        $dt['detail']=$det;
        $dt['notif']=$notif;
        return $dt;
    }

}
