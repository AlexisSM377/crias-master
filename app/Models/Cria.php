<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Cria extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nombre',
        'url_imagen',
        'peso',
        'color_muscular',
        'marmoleo',
        'costo',
        'cria_cuarentena',
        'descripcion',
        'proveedor_id',
        'proceso_id',
        'clasificacion_carne_id',
        'corral_id'
    ];

    protected $hidden = [
        'proveedor_id',
        'proceso_id',
        'clasificacion_carne_id',
        'corral_id'
    ];

    /**
     * Relación con proveedor.
     */
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class)->withTrashed();
        ;
    }

    /**
     * Relación con proceso.
     */
    public function proceso()
    {
        return $this->belongsTo(Proceso::class)->withTrashed();
    }

    /**
     * Relación con clasificación de carne.
     */
    public function clasificacionCarne()
    {
        return $this->belongsTo(ClasificacionCarne::class)->withTrashed();
    }

    /**
     * Relación con corral de la cría.
     */
    public function corral()
    {
        return $this->belongsTo(Corral::class)->withTrashed();
    }

    /**
     * Relación de dieta a cria.
     */
    public function dieta()
    {
        return $this->hasOne(Dieta::class);
    }
}
