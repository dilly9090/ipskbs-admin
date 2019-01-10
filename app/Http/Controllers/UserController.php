<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Sdm;
use Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::where('flag',1)->with('sdm')->get();
        $sdm=Sdm::orderBy('nama_lengkap')->get();
        $level=level();
        return view('pages.master.user')->with('user',$user)->with('sdm',$sdm)->with('level',$level);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'flag' => 'required',
            'level' => 'required'
        ])->validate();

        $sdm=Sdm::where('nama_lengkap','=',$request->name)->first();

        $insert=new User;
        $insert->name = $request->name;
        $insert->id_sdm = $sdm->id;
        $insert->email = $request->email;
        $insert->password = bcrypt($request->password);
        $insert->flag = $request->flag;
        $insert->level = $request->level;
        $insert->save();

        return redirect('master-user')->with('success','Data User Berhasil Di Tambah');
    }

    
    public function edit($id)
    {
        return User::find($id);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'flag' => 'required',
            'level' => 'required'
        ])->validate();

        $sdm=Sdm::where('nama_lengkap','=',$request->name)->first();

        $insert=User::find($id);
        $insert->name = $request->name;
        $insert->email = $request->email;
        
        if(!is_null)
            $insert->id_sdm = $sdm->id;

        if($request->password!='')
            $insert->password = bcrypt($request->password);
        
        $insert->flag = $request->flag;
        $insert->level = $request->level;
        $insert->save();

        return redirect('master-user')->with('success','Data User Berhasil Di Perbaharui');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('master-user.index')
            ->with('success', 'Anda telah menghapus data.');
    }

    public function sdm_detail($iduser)
    {
        $user=User::find($iduser);
        $sdm=Sdm::where('id',$user->id_sdm)->first();
        // return $user;
        return view('pages.master.user-data')->with('sdm',$sdm)->with('user',$user);
    }
    public function sdm_detail_simpan(Request $request,$iduser)
    {
        $user=User::find($iduser);

        $sdm=Sdm::where('id',$user->id_sdm)->first();
        if($sdm)
        {
            $sdm->nip = $request->nip;
            $sdm->nama_lengkap = $request->nama_lengkap;
            $sdm->tempat_lahir = $request->tempat_lahir;
            $sdm->status_pegawai = $request->status_pegawai;
            $sdm->kedudukan = $request->kedudukan;
            $sdm->email = $request->email;
            $sdm->id_user = $iduser;
            $sdm->save();

            $idsdm=$sdm->id;
        }
        else
        {
            $insert=new Sdm;
            $insert->nip = $request->nip;
            $insert->nama_lengkap = $request->nama_lengkap;
            $insert->tempat_lahir = $request->tempat_lahir;
            $insert->status_pegawai = $request->status_pegawai;
            $insert->kedudukan = $request->kedudukan;
            $insert->email = $request->email;
            $insert->id_user = $iduser;
            $insert->save();

            $idsdm=$insert->id;
        }

        $user->name=$request->nama_lengkap;
        $user->email=$request->email;
        $user->id_sdm=$idsdm;
        $user->save();

        return redirect('master-user')->with('success','Data Detail User Berhasil Di Perbaharui');
    }
}
