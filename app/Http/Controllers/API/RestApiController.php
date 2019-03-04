<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Notifikasi;
use App\User;
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
}
