<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    /**
     * nombre de la tabla en la db
     */
    protected $table = 'usuarios';

    /**
     * atributos a modificar
     */
    protected $fillable = ['rut','nombre', 'apellido', 'email', 'password','fecha_nacimiento'];
    
    /**
     * date create and update
     */
    public $timestamps = true;
}
