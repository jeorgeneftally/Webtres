<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios=Usuario::all();
        return view('usuario.index')->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
    }


    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $this->validate($request, [
            'rut'=>'required',
            'nombre'=>'required',
            'apellido'=>'required',
            'email'=>'required',
            'fecha_nacimiento'=>'required',
            'password'=>'required',
            'foto'=>'required'
        ]);

        // Crear usuario
        $pwd=hash('sha256',$request->input('password'));
        $usuario=new Usuario;
        $usuario->rut = $request->input('rut');
        $usuario->nombre = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');
        $usuario->email = $request->input('email');
        $usuario->fecha_nacimiento = $request->input('fecha_nacimiento');
        $usuario->foto = $request->input('foto');
        $usuario->password = $pwd;
        if($request->hasFile('foto')){
            $usuario->foto=$request->file('foto')->store('uploads','public');
        }

        $usuario->save();

        return redirect('/usuarios')->with('success','Usuario Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario=Usuario::find($id);
            return view('usuario.show')->with('usuario', $usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario=Usuario::find($id);
            return view('usuario.edit')->with('usuario', $usuario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      

        // Actualizar usuario
        $usuario=Usuario::find($id);
        $pwd=hash('sha256',$request->input('password'));
        $usuario->rut = $request->input('rut');
        $usuario->nombre = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');
        $usuario->email = $request->input('email');
        $usuario->fecha_nacimiento = $request->input('fecha_nacimiento');
        $usuario->password = $pwd;
        $usuario->save();


        return view('usuario.edit')->with('usuario',$usuario);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuarios=Usuario::find($id);
            $usuarios->delete();
            return redirect('/usuarios')->with('success','Usuario Eliminado');
    }

    public function verificaRut($rut){
        $usuario = Usuario::where('rut',$rut)->first();
          if (is_object($usuario)) {
              return response()->json(['error'=>'Rut no disponible']);
          } 
          return  response()->json(['success'=>'Rut disponible']);
      }
}
