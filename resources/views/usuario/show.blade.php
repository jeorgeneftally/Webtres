@extends('layout.layout')
@section('contenido')

<div class="row pt-5">
    <div class="col-md-4 mx-auto">
        <div class="card>">
            <img class="card-img-top" src="{{asset('storage').'/'.$usuario->foto}}" alt="Card image cap" style="width: 300px;">
            <div class="card-body">
                <h5 style="text-align: center;" class="card-title"><b>{{$usuario->nombre}} {{$usuario->apellido}}</b></h5>
                <br>
                <p class="card-text"><b>Rut:</b>  {{$usuario->rut}} </p>
                <p class="card-text"><b>Email:</b> {{$usuario->email}}</p>
                <p class="card-text"><b>Fecha Nacimiento:</b> {{date('d-M-Y', strtotime($usuario->fecha_nacimiento ))}}</p>
            </div>
        </div>
    </div>
</div>

@endsection