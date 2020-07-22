@extends('layout.layout')
@section('contenido')
<div class="row pt-5">
    <div class="col-md-8 mx-auto">
        <h1 style="text-align: center;">Editar Usuario</h1>
        <form action="{{url('/usuarios/'.$usuario->id)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <div class="form-row pt-3">
                <div class="form-group col-md-6">
                    <label for="email">{{'Email'}}</label>
                    <input type="email" class="form-control" id="email" value="{{$usuario->email}}" name="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" title="invalid">
                    <small>
                        <h6 style="text-align: center;" id="emal"></h6>
                    </small>
                </div>
                <div class="form-group col-md-6">
                    <label for="password">{{'Password'}}</label>
                    <input type="password" class="form-control" id="password" placeholder="new password" name="password">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nombre">{{'Nombre'}}</label>
                    <input type="text" class="form-control" id="nombre" value="{{$usuario->nombre}}" name="nombre">
                </div>
                <div class="form-group col-md-6">
                    <label for="apellido">{{'Apellido'}}</label>
                    <input type="text" class="form-control" id="apellido" value="{{$usuario->apellido}}" name="apellido">
                    <small>
                        <h6 style="text-align: center;" id="apellid"></h6>
                    </small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="rut">{{'Rut'}}</label>
                    <input type="text" class="form-control" id="rut" maxlength="10" value="{{$usuario->rut}}" name="rut" required oninput="checkRut(this)">
                    <small>
                        <h6 id="result"></h6>
                    </small>
                </div>
                <div class="form-group col-md-4">
                    <label for="fecha_nacimiento">{{'Fecha Nacimiento'}}</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" value="{{$usuario->fecha_nacimiento}}" name="fecha_nacimiento">
                </div>
                <div class="form-group col-md-4">
                    @if($usuario->foto)
                    <img style="border-radius: 5%;" src="{{asset('storage').'/'.$usuario->foto}}" alt="" width="150px">
                    @else
                    <img style="border-radius: 5%;" src="{{asset('storage').'/uploads/perfil.jpg'}}" alt="" width="150px">
                    @endif
                    <br>
                    <label for="foto">{{'Foto'}}</label>
                    <input type="file" class="form-control-file" id="foto" name="foto">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" id="boton">Editar</button>
            <a href="{{url('usuarios')}}" type="button" class="btn btn-info">Volver</a>
        </form>
    </div>
</div>
@endsection