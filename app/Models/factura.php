<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class factura extends Model
{
    protected $fillable = ['fecha','subtotal','impuestos','total','idcliente','idestado','idmodopago'];

    public function cliente(){
        return $this->belongsTo(cliente::class,'idcliente');
        
    }
    public function estado(){
        return $this->belongsTo(estado::class,'idestado');
    }

     public function modopago(){
        return $this->belongsTo(modopago::class,'idmodopago');
    }

    public function detallefacturas(){
        return $this->hasMany(detallefactura::class,'idfactura');
    }
}
