<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'total_kilos',
        'precio_por_kilo',
        'subtotal',
        'total',
        'cliente_id'
    ];

    public function crias()
    {
        return $this->belongsToMany(Cria::class);
    }

    /**
     * Relación con el cliente al que se le hizo la venta.
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
