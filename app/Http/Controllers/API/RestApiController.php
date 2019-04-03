<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Notifikasi;
use App\User;
use Hash;
class RestApiController extends Controller
{
    public function ShowTokenFireBase($id)
    {
        if($id==null)
            return Notifikasi::all();
        else
            return Notifikasi::find($id);
    }
    public function UpdateTokenFireBase(Request $request,$id)
    {
        if(isset($request->token))
        {

            $token=$request->token;
            $notif=User::find($id);
            $notif->token_firebase=$token;
            $notif->save();
            
            return "Success";
        }
        else
            return "Fail";
    }


    public function changepassword(Request $request)
    {
        $iduser=$request->id_user;
        $old=$request->old_ppasword;
        $new=$request->newpassword;
        $confirm=$request->confirmnewpassword;

        $user=User::find($iduser);
        if (Hash::check($old, $user->password)) {
            if($new==$confirm)
            {
                $user->password=bcrypt($new);
                $user->save();
                $data['status']='success';
                $data['message']='Ganti Password Berhasil';

            }
            else
            {
                $data['status']='fail';
                $data['message']='Konfirmasi Password Tidak Sama';
            }
        }
        else
        {
            $data['status']='fail';
            $data['message']='Ganti Password Gagal';
        }
        return $data;
    }
}
