<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $fillable = ['nombre','apellido','direccion','fechanacimiento','telefono','email','fecharegistro','genero'];
      public function factura(){

        return $this->hasMany(factura::class);
    }
}
