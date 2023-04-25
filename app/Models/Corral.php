<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Corral extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nombre',
        'corral_tipos_id'
    ];

    protected $hidden = [
        'corral_tipos_id'
    ];

    public $timestamps = false;

    /**
     * Relación con tipo corral.
     */
    public function corralTipo()
    {
        return $this->belongsTo(CorralTipo::class);
    }

    /**
     * Relacion de las crias del corral.
     */
    public function crias()
    {
        return $this->hasMany(Cria::class);
    }
}
