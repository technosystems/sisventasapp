<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $clientes =Cliente::get();

       return view('admin.clientes.index',compact('clientes'));
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
        $clientes =Cliente::get();
        return view ('admin.clientes.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardarajax(Request $request)
    {   
        //dd($request->idcliente <> null);

                $cliente = new Cliente();
                if($request->idcliente){
                    $cliente = Cliente::find($request->idcliente);

                    if($cliente->empresa){
                        $cliente->nombre = $request->razonSocial;
                        $cliente->rif = $request->rif;
                    }else{
                        $cliente->nombre = $request->nombre;
                        $cliente->apellido = $request->apellido;
                        $cliente->genero = $request->genero;
                        $cliente->cedula = $request->cedula;
                    }
                    $cliente->mail = $request->mail;
                    $cliente->direccion = $request->direccion;
                    $cliente->telefono = $request->telefono;
                    $cliente->save();
                    $notification = array(
                    'message' => '¡Los datos del cliente han sido modificados correctamente.!',
                    'alert-type' => 'success');
                    return \Redirect::to('admin/clientes/detalle/' . $cliente->id)->with($notification);
                }else{

                    if($request->tipo_cliente == "persona"){
                        $cliente->nombre = $request->nombre;
                        $cliente->apellido = $request->apellido;
                        $cliente->cedula = $request->cedula;
                           
                        if($request->tipo_documento != null){
                            $cliente->cedula = $request->cedula;
                           
                        }
                    }else{
                        $cliente->nombre = $request->razonSocial;
                        $cliente->rif = $request->rif;
                        $cliente->empresa = 1;
                    }
                    $cliente->mail = $request->mail;
                    $cliente->direccion = $request->direccion;          
                    $cliente->telefono = $request->telefono;

                    $cliente->save();

                    $id = $cliente->id;
                    $name = $cliente->nombre;
                    $telefono = $cliente->telefono;
                    
                    return compact('name','id','telefono'); 

                
            }
        }


      public function guardar(Request $request)
    {
        //dd($request);
       
       $cliente = new Cliente();
        if($request->cliente_id){
            $cliente = Cliente::find($request->cliente_id);

            if($cliente->empresa){
                $cliente->nombre = $request->razonSocial;
                $cliente->rif = $request->rif;
            }else{
                $cliente->nombre = $request->nombre;
                $cliente->apellido = $request->apellido;
                $cliente->genero = $request->genero;
                $cliente->cedula = $request->cedula;
            }
            $cliente->mail = $request->mail;
            $cliente->direccion = $request->direccion;
            $cliente->telefono = $request->telefono;
            $cliente->save();
            $notification = array(
            'message' => '¡Los datos del cliente han sido modificados correctamente.!',
            'alert-type' => 'success');
            return \Redirect::to('admin/clientes/detalle/' . $cliente->id)->with($notification);
        }else{

            if($request->tipo_cliente == "persona"){
                $cliente->nombre = $request->nombre;
                $cliente->apellido = $request->apellido;
                $cliente->cedula = $request->cedula;
                   
                if($request->tipo_documento != null){
                    $cliente->cedula = $request->cedula;
                   
                }
            }else{
                $cliente->nombre = $request->razonSocial;
                $cliente->rif = $request->rif;
                $cliente->empresa = 1;
            }
            $cliente->mail = $request->mail;
            $cliente->direccion = $request->direccion;          
            $cliente->telefono = $request->telefono;

            $cliente->save();
            $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success');

            return \Redirect::to('admin/clientes/nuevo/')->with($notification);
        }

    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function borrar($clientes)
    {
        $cliente = Cliente::find($clientes);
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
    public function update(Request $request, Clientes $clientes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
     public function detalle($cliente_id){
        $cliente = Cliente::find($cliente_id);
        $comprobantes = $cliente->ventas;
       

        return view('admin.clientes.detalle')->with(compact('cliente', 'comprobantes'));
    }
}
