<?php

namespace App\Models;
use App\Models\Marca;
use App\Models\Categoria;
use App\Models\DetalleFactura;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',        // precio FINAL con IVA
        'preciocompra',  // precio BASE
        'stock',
        'fechacreacion',
        'estado',
        'idcategoria',
        'idmarca',
        'impuesto_id'
    ];

    // ================= RELACIONES =================

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'idmarca');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idcategoria');
    }

    public function detallefactura()
    {
        return $this->hasMany(DetalleFactura::class);
    }

    public function impuesto()
    {
        return $this->belongsTo(Impuesto::class, 'impuesto_id');
    }

    // ================= ATRIBUTOS CALCULADOS =================

    // Valor del IVA (calculado desde precio base)
    public function getValorIvaAttribute()
    {
        if (!$this->impuesto) {
            return 0;
        }

        return $this->preciocompra * ($this->impuesto->porcentaje / 100);
    }

    // Subtotal (precio sin IVA)
    public function getSubtotalAttribute()
    {
        return $this->preciocompra;
    }
}