<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\Log\LogSistema;

class LoginController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('permission:Ver Logins')->only('index'); 

    }
    

    public function index(Request $request)
    { 
         
        $log = new LogSistema();
        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: '.auth()->user()->display_name.' Ha ingresado a ver los inicios de sesión del sistema a las: '
        . date('H:m:i').' del día: '.date('d/m/Y');
        $log->save();

        $logins = Login::orderBy('login_at', 'desc')->get();
        $roles = Role::get();
        return view('admin.login.index',  compact('roles','logins'));

        
    }




    public function show($id)
    {
       
        $logins = Login::with('user')->find(\Hashids::decode($id)[0])->get();
        $roles = Role::get();
        return view('admin.login.show',compact('logins','roles'));

    }

}
