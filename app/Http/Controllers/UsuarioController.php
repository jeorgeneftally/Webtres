<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
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
            'rut' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        // Crear usuario
        $pwd = hash('sha256', $request->input('password'));
        $usuario = new Usuario;
        $usuario->rut = $request->input('rut');
        $usuario->nombre = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');
        $usuario->email = $request->input('email');
        $usuario->fecha_nacimiento = $request->input('fecha_nacimiento');
        $usuario->foto = $request->input('foto');
        $usuario->password = $pwd;
        if ($request->hasFile('foto')) {
            $usuario->foto = $request->file('foto')->store('uploads', 'public');
        }

        $usuario->save();

        return redirect('/usuarios')->with('success', 'Usuario Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);
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
        $usuario = Usuario::find($id);
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
        $usuario = Usuario::find($id);
        $pwd = hash('sha256', $request->input('password'));
        $usuario->rut = $request->input('rut');
        $usuario->nombre = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');
        $usuario->email = $request->input('email');
        $usuario->fecha_nacimiento = $request->input('fecha_nacimiento');
        $usuario->password = $pwd;
        if ($request->hasFile('foto')) {

            Storage::delete('public/' . $usuario->foto);
            $usuario->foto = $request->file('foto')->store('uploads', 'public');
        }
        $usuario->save();
        return view('usuario.edit')->with('usuario', $usuario);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        Storage::delete('public/' . $usuario->foto);
        $usuario->delete();
        return redirect('/usuarios')->with('success', 'Usuario Eliminado');
    }

    /**
     * @param  string  $rut
     * @return \Illuminate\Http\Response
     * vareifica que exista el rut del usuario en la base de datos
     */
    public function verificaRut($rut)
    {
        $usuario = Usuario::find('rut', $rut)->first();
        if (is_object($usuario)) {
            return response()->json(['error' => 'RUT No Disponible']);
        }
        return  response()->json(['success' => 'RUT Disponible']);
    }

    /**
     * listado de todos los usuarios api
     */
    public function getAllUsuarios()
    {
        $usuarios = Usuario::all();
        if (is_object($usuarios)) {
            $data = array(
                'code' => 200,
                'status' => 'success',
                'users' => $usuarios
            );
        } else {
            $data = array(
                'code' => 404,
                'status' => 'error',
                'message' => 'Los usuarios no existen'
            );
        }
        return response()->json($data, $data['code']);
    }
    /**
     * buscar ususario por id api
     */
    public function findById($id)
    {
        $usuario = Usuario::find($id);
        if (is_object($usuario)) {
            $data = array(
                'code' => 200,
                'status' => 'success',
                'usuario' => $usuario
            );
        } else {
            $data = array(
                'code' => 404,
                'status' => 'error',
                'message' => 'No existe el usuario'
            );
        }
        return response()->json($data, $data['code']);
    }

    /**
     * eliminar usuario por id api
     */
    public function destroyUsuario($id)
    {
        //conseguir el registro 
        $usuario = Usuario::find($id);
        if (is_object($usuario)) {

            //Borrar el registro
            $usuario->delete();

            //Devolver una respuesta
            $data = [
                'code' => 200,
                'status' => 'success',
                'message' => 'El usuario con id: ' . $usuario->id . ', fue eliminado'
            ];
        } else {
            $data = [
                'code' => 404,
                'status' => 'error',
                'message' => 'El usuario no existe'
            ];
        }
        return response()->json($data, $data['code']);
    }
}
