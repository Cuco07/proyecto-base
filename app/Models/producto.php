<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $fillable = ['nombre','descripcion','precio','preciocompra','stock','fechacreacion','estado','idcategoria','idmarca'];

    public function marca(){
        return $this->belongsTo(marca::class,'idmarca');

    }
    public function categopria(){
        return $this->belongsTo(categoria::class,'idcategoria');
        
    }

    public function detallefactura(){
        return $this->hasMany(detallefactura::class);
    }

}
