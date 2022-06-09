<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $clientes =Proveedor::get();

       return view('admin.proveedores.index',compact('clientes'));
    }


     public function clienteslistado()
    {
       $clientes =Cliente::get();

       return $clientes;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    } 

   

      public function guardar(Request $request)
    {
        //dd($request);
        $proveedor = new Proveedor();
        $proveedor->company_name =$request->company_name;
        $proveedor->vat_number =$request->vat_number;
        $proveedor->email =$request->email;
        $proveedor->phone_number =$request->phone_number;
        $proveedor->rif_number =$request->rif_number;
        $proveedor->address =$request->address;
        $proveedor->status =$request->status;
        $proveedor->user_id = \Auth::user()->id;
        $proveedor->save();

        
         $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification); 

    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function borrar($proveedor)
    {
        $cliente = Proveedor::find($proveedor);
        $cliente->delete();

         $notification = array(
            'message' => '¡Datos eliminados!',
            'alert-type' => 'success'
        );
        
    
        
              return redirect()->back()->with($notification); 


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit(Clientes $clientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$proveedor)
    {
        $proveedor = Proveedor::find($proveedor);
        $proveedor->company_name =$request->company_name;
        $proveedor->vat_number =$request->vat_number;
        $proveedor->email =$request->email;
        $proveedor->phone_number =$request->phone_number;
        $proveedor->rif_number =$request->rif_number;
        $proveedor->address =$request->address;
        $proveedor->status =$request->status;
        $proveedor->user_id = \Auth::user()->id;
        $proveedor->save();

        
         $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clientes $clientes)
    {
        //
    }
}
