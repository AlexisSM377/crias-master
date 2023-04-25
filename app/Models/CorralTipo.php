<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class CorralTipo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nombre',
        'tipo'
    ];

    /**
     * Relacion del tipo de corral con el corral.
     */
    public function corrals()
    {
        return $this->hasMany(Corral::class);
    }
}
