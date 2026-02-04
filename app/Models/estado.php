<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = ['descripcion', 'estado'];

    protected $casts = [
        'activo' => 'boolean',
    ];

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }
}
