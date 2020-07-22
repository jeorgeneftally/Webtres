@extends('layout.layout')
@section('contenido')
<div class="row pt-5">
    <div class="col-md-4 mx-auto">
        <div class="card>">
            @if($usuario->foto)
            <img class="card-img-top" src="{{asset('storage').'/'.$usuario->foto}}" alt="" style="width: 200px;">
            @else
            <img class="card-img-top" src="{{asset('storage').'/uploads/perfil.jpg'}}" alt="" style="width: 200px;">
            @endif
            <div class="card-body">
                <h5  class="card-title"><b> {{ ucfirst($usuario->nombre)}} {{ ucfirst($usuario->apellido)}}</b></h5>
                <br>
                <p class="card-text"><b>Rut:</b> {{$usuario->rut}} </p>
                <p class="card-text"><b>Email:</b> {{$usuario->email}}</p>
                <p class="card-text"><b>Fecha Nacimiento:</b> {{date('d-m-Y', strtotime($usuario->fecha_nacimiento ))}}</p>
                <a href="{{url('usuarios')}}" type="button" class="btn btn-info btn-block">Volver</a>
            </div>
        </div>
    </div>
</div>

@endsection