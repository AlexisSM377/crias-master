<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SensorRegistro extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'frecuencia_cardiaca',
        'frecuencia_sanguinea',
        'frecuencia_respiratoria',
        'temperatura',
        'saludable',
        'cria_id'
    ];

    /**
     * Relación con la cría.
     */
    public function cria()
    {
        return $this->belongsTo(Cria::class)->withTrashed();
    }
}
