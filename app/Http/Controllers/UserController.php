<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\Models\Log\LogSistema;
use Spatie\Permission\Models\Role;
class UserController extends Controller
{
     public function __construct()
    {
        $this->middleware('permission:Ver Usuario')->only('index'); 
        $this->middleware('permission:Registrar Usuario')->only('create');
        $this->middleware('permission:Registrar Usuario')->only('store');
        $this->middleware('permission:Editar Usuario')->only('edit');
        $this->middleware('permission:Editar Usuario')->only('update');
        $this->middleware('permission:Ver Usuario')->only('show'); 

    }
   
    public function index(Request $request)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: '.auth()->user()->display_name.' Ha ingresado a ver los usuarios a las: '
        . date('H:m:i').' del día: '.date('d/m/Y');
        $log->save();


        $users = User::with('roles')->with('permissions')
                       ->orderBy('created_at', 'desc')
                       ->paginate(10);

        return view('admin.usuarios.index', ['users' => $users]);
    }




    public function create()
    {
        
        $log = new LogSistema();
        
        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: '.auth()->user()->display_name.' Ha ingresado a crear un usuario a las: '
        . date('H:m:i').' del día: '.date('d/m/Y');
        $log->save();
        $roles = Role::get();
        return view('admin.usuarios.create',compact('roles'));
    }




    public function store(Request $request)
    {
        $user = User::create($request->except('role'));

        if ($request->has('role'))
        {
            $user->assignRole($request->role);
        }

        $log = new LogSistema();
        
        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: '.auth()->user()->display_name.' Ha ingresado al sistema el usuario: '.$request->name.' '.$request->lastname.' a las: '
        . date('H:m:i').' del día: '.date('d/m/Y');
        $log->save();

        return json_encode(['success' => true, 'user_id' => $user->id]);
    }




    public function show($id)
    {
        $user = User::find($id);

         $log = new LogSistema();
        
         $log->user_id = auth()->user()->id;
         $log->tx_descripcion = 'El usuario: '.auth()->user()->display_name.' Ha ingresado a ver los datos del usuario: '.$user->display_name.' a las: '
        . date('H:m:i').' del día: '.date('d/m/Y');
        $log->save();

        return view('admin.usuarios.show', ['user' => $user]);
    }




    public function edit($id)
    {
        $user = User::find($id);

        $log = new LogSistema();
        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: '.auth()->user()->display_name.' Ha ingresado a editar los datos del usuario: '.$user->display_name.' a las: '
        . date('H:m:i').' del día: '.date('d/m/Y');
        $log->save();
        return view('admin.usuarios.edit', ['user' => $user]);
    }




    public function update(UpdateUser $request, $id)
    {
        $user = User::find($id);
        
        $user->update($request->except('role'));

        if ($request->has('role'))
        {
            $user->syncRoles($request->role);
        }

         $log = new LogSistema();
        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: '.auth()->user()->display_name.' Ha modificó los datos del usuario: '.$user->display_name.' a las: '
        . date('H:m:i').' del día: '.date('d/m/Y');
        $log->save();

        return json_encode(['success' => true]);
    }




    public function destroy($id)
    {
        $user = User::find(\Hashids::decode($id)[0])->delete();

        return json_encode(['success' => true]);
    }



    public function autocomplete(Request $request)
    {
        return User::search($request->q)->take(10)->get();
    }
}
