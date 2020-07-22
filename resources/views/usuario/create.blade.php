@extends('layout.layout')
@section('contenido')

<div class="row pt-5">
    <div class="col-md-8 mx-auto">
    <h1 style="text-align: center;">Formulario de registro de usuarios</h1>
    <form action="{{url('/usuarios')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-row pt-3">
    <div class="form-group col-md-6">
        <label for="email">{{'Email'}}</label>
        <input type="email" class="form-control" id="email" placeholder="ej: ejemplo@ejemplo.com" name="email" required>
    </div>
    <div class="form-group col-md-6">
        <label for="password">{{'Password'}}</label>
        <input type="password" class="form-control" id="password"  placeholder="password" name="password" required>
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
        <label for="nombre">{{'Nombre'}}</label>
        <input type="text" class="form-control" id="nombre" placeholder="nombre" name="nombre" required>
    </div>
    <div class="form-group col-md-6">
        <label for="apellido">{{'Apellido'}}</label>
        <input type="text" class="form-control" id="apellido" placeholder="apellido" name="apellido" required>
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-4">
        <label for="rut">{{'Rut'}}</label>
        <input type="text" class="form-control" id="rut" placeholder="ej:11.111.111-1" name="rut" required>
        <br>
        <small><h6 style="text-align: center;" id="result" ></h6></small>
    </div>
    <div class="form-group col-md-4">
        <label for="fecha_nacimiento">{{'Fecha Nacimiento'}}</label>
        <input type="date" class="form-control" id="fecha_nacimiento"  name="fecha_nacimiento" required>
    </div>
    <div class="form-group col-md-4">
        <label for="foto">{{'Foto'}}</label>
        <input type="file" class="form-control" id="foto" name="foto">
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Registrar</button>
    <a href="{{url('usuarios')}}" type="button" class="btn btn-info">Volver</a>
</form>
    </div>
</div>

@endsection