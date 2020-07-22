@extends('layout.layout')
@section('contenido')
<div class="row pt-5">
    <div class="col-md-12 mx-auto">
        <h1 style="text-align: center;"><b>Listado de usuarios</b></h1>
        <br>
        <a href="{{url('usuarios/create')}}" type="button" class="btn btn-primary float-right">Registrar usuario</a>
        <br>
        <br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Rut</th>
                    <th scope="col">Email</th>
                    <th scope="col">Fecha Nacimiento</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($usuarios as $usuario)
                <tr>
                    <th>{{$loop->index+1}}</th>
                    <td><img style="border-radius: 5%;" src="{{asset('storage').'/'.$usuario->foto}}" alt="" width="90px"></td>
                    <td>{{$usuario->nombre}}</td>
                    <td>{{$usuario->apellido}}</td>
                    <td>{{$usuario->rut}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>{{date('d-M-Y', strtotime($usuario->fecha_nacimiento ))}}</td>
                    <td>
                        <form method="POST" action="{{ url("usuarios/{$usuario->id}") }}">
                        <a href="{{url('usuarios/'.$usuario->id)}}" type="button" class="btn btn-info"><i class="fas fa-eye"></i></a>
                            <a href="{{url('usuarios/'.$usuario->id.'/edit')}}" type="button" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <div class="alert alert-dismissable alert-warning">
                    <h1 style="text-align: center;">No hay registro de usuarios</h1>
                </div>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection