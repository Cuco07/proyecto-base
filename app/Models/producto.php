<?php

namespace App\Models;
use App\Models\Marca;
use App\Models\Categoria;
use App\Models\DetalleFactura;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['nombre','descripcion','precio','preciocompra','stock','fechacreacion','estado','idcategoria','idmarca'];

    public function marca(){
        return $this->belongsTo(marca::class,'idmarca');

    }
    public function categoria(){
        return $this->belongsTo(categoria::class,'idcategoria');
        
    }

    public function detallefactura(){
        return $this->hasMany(detallefactura::class);
    }

}
